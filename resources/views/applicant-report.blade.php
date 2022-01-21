<!DOCTYPE html>
<html>
	<head>
	  <title>Fashionphile Dev Test</title>
	  <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssreset/cssreset-min.css">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.9.1/build/cssbase/cssbase-min.css">
    	
    <style type="text/css">
		      #page {
		        width: 1200px;
		        margin: 30px auto;
		      }
		      .job-applicants {
		        width: 100%;
		      }
		      .job-name {
		        text-align: center;
		      }
		      .applicant-name {
		        width: 150px;
		      }
		      .skill-table-data {
		      	padding: 0px;
		      }
		      .skill-table {
		      	width: 100%;
		      	margin: 0px;
		      }
		      .skill-table td {
		      	border: none;
		      }
		</style>
	</head>
	
	
	<body>
		<div id="page">
			<table class="job-applicants">
				<thead>
          <tr>
            <th>Job</th>
            <th>Applicant Name</th>
            <th>Email Address</th>
            <th>Website</th>
            <th>Skills</th>
            <th>Cover Letter Paragraph</th>
          </tr>
        </thead>

        <tbody>
        	<tr>
        		@foreach ($jobs as $job)
        			<?php
        				$jobApplicantCount = 0;
        				for ($i=0; $i < count($applicants); $i++) { 
        					if ($applicants[$i]->job_id == $job->id) {
        						$jobApplicantCount++;
        					}
        				}

        				if($jobApplicantCount == 0) { //skip the job if it doesn't have any applicants
        					continue;
        				}
        			?>
        		
        			<td class="job-name" rowspan={{$jobApplicantCount + 1}}>{{$job->name}}</td>
        			@foreach ($applicants as $applicant)
        				@if($applicant->job_id == $job->id)
        				<tr>
        					<td class="applicant-name">{{$applicant->name}}</td>
        					<td><a href="mailto:" . {{$applicant->email}}>{{$applicant->email}}</td>
        					<td><a href={{$applicant->website}}>{{$applicant->website}}</td>
        					<td class="skill-table-data">
        						<table class="skill-table">
        							@foreach ($skills as $skill)
        								@if($skill->applicant_id == $applicant->id)
        									<tr>
        										<td>{{$skill->name}}</td>
        									</tr>
        								@endif
        							@endforeach
        						</table>
        					</td>
        					<td>{{$applicant->cover_letter}}</td>
        				</tr>
        				@endif
        			@endforeach
        		@endforeach
        	</tr>
        </tbody>

				<tfooter>
					<tr>
						<td colspan="6">{{count($applicants)}} Applicants, {{$uniqueSkills}} Unique Skills</td>
					</tr>
				</tfooter>
			</table>
		</div>
	</body>
</html>