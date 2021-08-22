<br /><br /><br />
<ul id="home" class="grid_8 prefix_2 suffix_2">
	<li style="text-align: center">
		<table style="margin-bottom: 10px">
			<thead>
				<tr>
					<th>Teams</th>
					<th>Total Students</th>
					<th>Total Girls</th>
					<th>New Girls this Year</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?=$data['teamCount']?></td>
					<td><?=$data['studentCount']?></td>
					<td><?=$data['girlCount']?></td>
					<td><?=$data['addedCount']?></td>
				</tr>
			</tbody>
		</table>
		<img src="http://chart.apis.google.com/chart?chs=300x100&amp;chf=bg,s,5F0E84&amp;chco=00ff00,008800&amp;chd=t:<?=$percentGuys?>,<?=$percentGirls?>&amp;cht=p3&amp;chl=Students|Girls" width="300" height="100" alt="<?=$percentGirls?>% of students in FIRST are girls!" />
		<img src="http://chart.apis.google.com/chart?chs=300x100&amp;chf=bg,s,5F0E84&amp;chco=00ff00,008800&amp;chd=t:<?=$percentVeteranGirls?>,<?=$percentNewGirls?>&amp;cht=p3&amp;chl=Veteran+Girls|New+Girls" width="300" height="100" alt="<?=$percentNewGirls?>% of girls in FIRST are new this year!" />
	</li>
	
	<li>If every team in FIRST Robotics recruited just two more girls to their team for the 2009/2010 season that would mean 4,000 more girls involved in FIRST!</li>
	<li><h3><a href="signup" title="<?php echo Kohana::lang('site.nav.signup.title'); ?>">Sign up</a> to let everyone know how many girls you recruited to your team and what you did to recruit them!</h3></li>
	<li>If you are a high school girl and you have decided at this time you want to study a subject in the Science, Technology, Engineering, or Math (STEM) area, <a href="forum/view/<?php echo Kohana::config('links.forum.stemMajor'); ?>">let us know</a> what you plan to study and how you came to this decision.</li>
	<li>If you are a high school girl involved in FIRST, but have decided not to go towards a STEM career, please <a href="forum/view/<?php echo Kohana::config('links.forum.nonStemMajor'); ?>">let us know why</a>.  These are extremely important stories for us to know!</li>
	<li>If you are thinking of going towards a STEM career, but are unsure at this time and have questions for women that are in STEM careers, please <a href="forum/view/<?php echo Kohana::config('links.forum.careerQuestions'); ?>">post your question here</a>.</li>
</ul>
