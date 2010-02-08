<?php
/*

CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `type` varchar(32) NOT NULL,
  `md5` char(32) NOT NULL,
  `sha1` char(40) NOT NULL,
  `data` longblob NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

*/

class File_Model extends ORM {

	protected $dbKey = 'default'; // this should be the same as $this->db

	public $temp; // temporary filepath during upload

	public function __construct($id = null) {
		ini_set('memory_limit', '128M');
		parent::__construct($id);
	} // function __construct

	public function cache() {
		return file_put_contents($this->filesystemPath, $this->data);
	} // function cache

	public function delete() {
		if (file_exists($this->filesystemPath)) {
			unlink($this->filesystemPath);
		}
		return parent::delete();
	} // function delete	

	private function fileExists($fileName) {
		return (bool) $this->db
			->where($this->unique_key($fileName), $fileName)
			->count_records($this->table_name);
	} // function fileExists
	
	public function getFolder() {
		return DOCROOT . 'media' . DIRECTORY_SEPARATOR;
	} // function getPath

	public function getFilesystemPath() {
		return $this->folder . $this->name;
	} // function getPath
		
	public function getPath() {
		return url::base() . 'media/' . $this->name;
	} // function getPath
	
	// Custom save using Prepared Statements to work w/ longblobs...
	// Yes, it's something of a hackish workaround. But it gets the job done.
	public function save() {
		if ($this->loaded) {
			return parent::save();
		}
		else {
			$driver = new Database_Mysqli_Driver(Kohana::config("database.$this->dbKey"));
			$link = $driver->connect();
			$statement = $link->prepare('INSERT INTO files(name, size, type, md5, sha1, data) VALUES (?,?,?,?,?,?)');
		
			$name = $this->name;
			$size = $this->size;
			$type = $this->type;
			$md5  = $this->md5  = md5_file($this->temp);
			$sha1 = $this->sha1 = sha1_file($this->temp);
		
			$null = null;
		
			$statement->bind_param('sisssb', $name, $size, $type, $md5, $sha1, $null);

			$fp = fopen($this->temp,'r');
			while (!feof($fp)) {
				$statement->send_long_data(5, fread($fp,8192));
			}
			
			$statement->execute();
			$this->object[$this->primary_key] = $statement->insert_id;
			$statement->close();
			fclose($fp);

			// Post-save cleanup (copied from native ORM)
			$this->loaded = $this->saved = TRUE;
			$this->changed = array();
			
			return $this;
		}
	} // function save
		
	protected function setData($data) {
		throw new Exception('$data cannot be set directly. Set $temp to the temporary upload path instead.');
	} // function setData

	protected function setName($originalName) {
		$i = 0;
		$name = $originalName;
		while ($this->fileExists($name)) {
			$i++;
			$name = "($i) " . $originalName; 
		}
		return $name;
	} // function setName

	/**
	 * Pass a key from $_FILES to this to store said file
	**/
	public static function upload(array $files) {
		$file = new self;
		$file->name = $files['name'];
		$file->size = $files['size'];
		$file->type = $files['type'];
		$file->temp = $files['tmp_name'];
		return $file->save();
	} // function upload

	public function unique_key($id) {
		return is_numeric($id) ? parent::unique_key($id) : 'name';
	} // function unique_key


} // class File_Model
