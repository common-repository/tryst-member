<table class="table">
    <tbody>
    <tr>
        <th><?php _e('Name', 'tryst-member'); ?></th>
        <td><?php echo $member->getMeta('name'); ?></td>
    </tr>
    <tr>
        <th><?php _e('Phone', 'tryst-member'); ?></th>
        <td><?php echo $member->getMeta('phone'); ?></td>
    </tr>
    <tr>
        <th><?php _e('E-mail'); ?></th>
        <td><?php echo $member->getMeta('email'); ?></td>
    </tr>

</tbody>
</table>