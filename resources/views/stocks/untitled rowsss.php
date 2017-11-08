<?php while($row = mysqli_fetch_array($search_result)):?>

							<tr>
								<td><?php echo $row['id'] ;?> </td>
								<td><?php echo $row['item_name'] ;?> </td>
								<td><?php echo $row['category'] ;?> </td>
								<td><?php echo $row['item_price'] ;?> </td>
								<td><?php echo $row['quantity'] ;?> </td>
								<td><?php echo $row['supplier'] ;?> </td>
								<td><?php echo $row['created_at'] ;?> </td>

							</tr>
					<?php endwhile;?>