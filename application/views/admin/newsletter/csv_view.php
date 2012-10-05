<table cellpadding="0" cellspacing="0">
	<thead>
	<th>
			<td>EMAIL</td>
	</th>
	</thead>

	<tbody>
            <?php foreach($csvData as $field){?>
                <tr>
                    <td><?php echo  array_shift($field); ?></td>
                </tr>
            <?php }?>
	</tbody>

</table>
