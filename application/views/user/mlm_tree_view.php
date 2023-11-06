<!-- Recursive function to display the MLM tree structure -->
<?php function displayMlmTree($tree) { ?>
    <ul>
        <?php foreach ($tree as $node) { ?>
            <li>
                <?php echo $node->user->id; ?> - <?php echo $node->user->first_name; ?> <?php echo $node->user->last_name; ?>
                <?php if (!empty($node->children)) { ?>
                    <?php displayMlmTree($node->children); ?>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
<?php } ?>

<!-- Display the MLM tree structure -->
<h1>MLM Tree</h1>
<?php displayMlmTree($tree); ?>