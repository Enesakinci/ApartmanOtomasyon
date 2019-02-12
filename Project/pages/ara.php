<?php
$connect = mysqli_connect("localhost", "root", "", "apartman");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
	SELECT * FROM kullanici 
	WHERE ad LIKE '%".$search."%' 
	OR K_adi LIKE '%".$search."%' 
	";
}
else
{
    $query = "
	SELECT * FROM kullanici ORDER BY id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>id</th>
							<th>K_adi</th>
							<th>Ad</th>
							<th>Apartman id</th>
							<th>Borç</th>
						</tr>';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
			<tr>
				<td>'.$row["id"].'</td>
				<td>'.$row["K_adi"].'</td>
				<td>'.$row["ad"].'</td>
				<td>'.$row["apartman_id"].'</td>
				<td>'.$row["borc"].'</td>
			</tr>
		';
    }
    echo $output;
}
else
{
    echo 'Veri Bulunamadı';
}
?>