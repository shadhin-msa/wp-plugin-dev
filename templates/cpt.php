<div class="wrap">

    <h1>Custom Post Type</h1>

	<?php settings_errors();?>

	<ul class="nav nav-tabs">

		<li class="<?php echo isset($_POST['edit']) ?: 'active'; ?>"><a href="#tab-1">Your Custom Post Types</a></li>

        <li class=" <?php echo isset($_POST['edit']) ? 'active' : ''; ?>"><a href="#tab-2"><?php echo isset($_POST['edit']) ? 'Update ' : 'Add '; ?> Custom Post Type</a></li>

        <li><a href="#tab-3">About</a></li>

	</ul>

	<div class="tab-content">

		<div id="tab-1" class="tab-pane <?php echo isset($_POST['edit']) ?: 'active'; ?>">

             <table class="cpt-table">
                <thead>
                    <tr>
                        <th>Post Type</th>
                        <th>Single Name</th>
                        <th>Plural Name</th>
                        <th>Public</th>
                        <th>Has Archive</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php

$posts = (get_option('wppd_cpt')) ?: [];

foreach ($posts as $post) {

    $post_type = $post['post_type'];

    $single_name = $post['single_name'];

    $plural_name = $post['plural_name'];

    $public = (isset($post['public'])) ? "True" : "False";

    $has_archive = (isset($post['has_archive'])) ? "True" : "False";

    echo "<tr scope='row'>";

    echo "<td>$post_type</td>";

    echo "<td>$single_name</td>";

    echo "<td>$plural_name</td>";

    echo "<td>$public</td>";

    echo "<td>$has_archive</td>";

    echo '<td><form method="post" action="" class="inline-block">';

    settings_fields('wppd_cpt_settings_group');

    echo '<input type="hidden" name="edit" value="' . $post_type . '">';

    submit_button('Edit', 'edit small', 'submit', false);

    echo '</form> ';

    echo ' <form method="post" action="options.php" class="inline-block">';

    settings_fields('wppd_cpt_settings_group');

    echo '<input type="hidden" name="remove" value="' . $post_type . '">';

    submit_button('Delete', 'deleet small', 'submit', false, [
        'onclick' => 'return confirm("Are you sure you want to delete this?")',
    ]);

    echo "</form></td>";

    echo "</tr>";
}
?>
                </tbody>
            </table>
        </div>

        <div id="tab-2" class="tab-pane <?php echo isset($_POST['edit']) ? 'active' : ''; ?>">

			<form method="post" action="options.php">
<?php

settings_fields('wppd_cpt_settings_group');

do_settings_sections('wppd_cpt_manager');

submit_button();

?>
            </form>

		</div>

		<div id="tab-3" class="tab-pane">

            <h3>About</h3>

		</div>
	</div>
</div>