

<div class="form-group col-md-4 w-employee">
<label for="f-name"><?php _e('Name', 'tryst-member'); ?></label>
<input type="text" class="form-control f-member validate[required]" name="member[name]" id="f-name" value="<?php if(isset($member)) echo $member->getUser()->first_name ?>">
</div>


<div class="form-group col-md-4">
<label for="f-email">E-mail</label>
<input type="email" class="form-control f-member validate[required]" name="member[email]" id="f-email" value="<?php if(isset($member))  echo $member->getEmail(); ?>">
</div>

<div class="form-group col-md-4 w-employee">
<label for="f-phone"><?php _e('Phone', 'tryst-member'); ?></label>
<input type="tel" class="form-control f-member validate[required] phoneMobile" name="member[phone]" id="f-phone" value="<?php if(isset($member))  echo $member->getPhone(); ?>">
</div>

