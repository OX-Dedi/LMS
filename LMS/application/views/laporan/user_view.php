<!DOCTYPE html>
<html>
<head>

	<!-- Datatable CSS -->
	<link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

	<!-- jQuery Library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Datatable JS -->
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</head>
<br>
<body>

	<!-- Search filter -->
	<div>
		<!-- filter -->
		<select id='sel_faculty'>
			<option value=''>-- Select Faculty --</option>
			<?php 
			foreach($facultys as $faculty_id){
				echo "<option value='".$faculty_id."'>".$faculty_id."</option>";
			}
			?>
		</select>

		<select id='sel_program'>
			<option value=''>-- Select program --</option>
			<?php 
			foreach($programs as $program_id){
				echo "<option value='".$program_id."'>".$program_id."</option>";
			}
			?>
		</select>

		<select id='sel_semester'>
			<option value=''>-- Select semester --</option>
			<?php 
			foreach($semesters as $semester_id){
				echo "<option value='".$semester_id."'>".$semester_id."</option>";
			}
			?>
		</select>

		<select id='sel_nama'>
			<option value=''>-- Select nama --</option>
			<?php 
			foreach($namas as $nama){
				echo "<option value='".$nama."'>".$nama."</option>";
			}
			?>
		</select>

		<select id='sel_kelas'>
			<option value=''>-- Select kelas --</option>
			<?php 
			foreach($kelass as $kelas){
				echo "<option value='".$kelas."'>".$kelas."</option>";
			}
			?>
		</select>

		<select id='sel_activity'>
			<option value=''>-- Select activity --</option>
			<?php 
			foreach($activitys as $activity){
				echo "<option value='".$activity."'>".$activity."</option>";
			}
			?>
		</select>

		<!-- Name -->
	</div>
<br>
	<!-- Table -->
	<table id='userTable' class='display dataTable'>

	  <thead>
	    <tr>
	      <th>Faculty id</th>
	      <th>Program id</th>
	      <th>Semester id</th>
	      <th>Nama</th>
	      <th>Kelas</th>
		  <th>Activity</th>
	      <th>Total Activiy</th>
	    </tr>
	  </thead>
	  <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>Faculty id</th>
                    <th>Program id</th>
                    <th>Semester id</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Activity</th>
					<th>Total Activiy</th>
                </tr>
            </tfoot>
	</table>

	<!-- Script -->
	<script type="text/javascript">
	$(document).ready(function(){
	   	var userDataTable = $('#userTable').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	//'searching': false, // Remove default Search Control
	      	'ajax': {
	          'url':'<?=base_url()?>index.php/Users/userList',
	          'data': function(data){
					data.searchProgram = $('#sel_program').val();
					data.searchSemester = $('#sel_semester').val();
					data.searchNamas = $('#sel_nama').val();
					data.searchKelas = $('#sel_kelas').val();
					data.searchActivity = $('#sel_activity').val();
					data.searchFaculty = $('#sel_faculty').val();
	          		data.searchName = $('#searchName').val();
	          }
	      	},
	      	'columns': [
	         	{ data: 'faculty_id' },
	         	{ data: 'program_id' },
				{ data: 'semester_id' },
	         	{ data: 'nama' },
	         	{ data: 'kelas' },
				{ data: 'activity' },
				{ data: 'total' },

	      	]
	   	});

	   	$('#sel_semester,#sel_program,#sel_nama,#sel_kelas,#sel_activity,#sel_faculty').change(function(){
	   		userDataTable.draw();
	   	});

	});
	</script>
</body>
</html>






