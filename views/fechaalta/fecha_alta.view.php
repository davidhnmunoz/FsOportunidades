<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
    </head>
    <body>

        <table>
	            <thead>
	                <tr>
	                    <th>
	                        fecha
	                    </th>
	                </tr>
	            </thead>
	            <?php foreach ($fecha as $rfecha): {}?>
			            <tbody>
			                <tr>
			                    <td>
			                        <?php echo $rfecha['fecha_alta']; ?>
			                    </td>
			                </tr>
			                <?php endforeach;?>
            </tbody>
        </table>
    </body>
</html>

