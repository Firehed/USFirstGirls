<?

class Profile_2011_Model extends ORM {

	protected $table_name = 'profiles_2011';
	protected $primary_key = 'user_id';

	public static $ethnicity = array(
		0 => '- Select -',
		1 => 'American Indian/Alaska Native',
		2 => 'Asian',
		3 => 'Black/African-American',
		4 => 'Hispanic/Latino',
		5 => 'Native Hawaiian/Pacific Islander',
		6 => 'White',
		7 => 'Other',
	);

}
