<?php 
	function getProducts($data, $id_type, $str=' ', $select )
	{
		foreach ($data as $val) {
			$id = $val["id"];
			$ten =$val["name"];
			if($val['id_type'] == $id_type)
			{
				if($val['id_type']==0)
				{
					echo '<optgroup label = ' .$ten. '>';
				}
				else
				{
					echo "<option selected value='" . $id ."'>" .$str .$ten ."</option>";
				}
			}
			else
			{
				if($val['id_type']==0)
				{
					echo '<optgroup label = ' .$ten. '>';
				}
				else
				{
					echo "<option selected value='".$id ."'>" .$str .$ten ."</option>";
				}
			}
			getProducts($data, $id, $str. ' ', $select);
		}
	}
  