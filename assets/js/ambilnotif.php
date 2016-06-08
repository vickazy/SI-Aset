<?php
	$conn = new mysqli('localhost', 'root', '', 'si_aset');

	$isi="";
	$sql= "SELECT *FROM pengusulan where status=0 order by waktu_pengusulan desc";
	$count=0;
       $result = $conn->query($sql);
            if($result->num_rows>0)
            {
                    while($row = $result->fetch_assoc())
                          {
                          	$count=$count+1;
                          $isi.='<li>
				<a href="<?php echo base_url()?>index.php/persetujuan/setujui/<?php echo $row->id_usul; ?>">
					<i class="fa fa-users text-yellow"></i>'.$row["id_usul"].' - '.$row["id_user"].'
				</a>
			</li>';}
            }
	
	echo $count.'|*-*|'.$isi;
?>