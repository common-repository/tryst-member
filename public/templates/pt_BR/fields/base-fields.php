
<div class="form-group col-md-6 w-employee">
<label for="f-register"> Matrícula do empregado</label>
<input type="text" class="form-control f-member f-employee" name="member[register]" id="f-name" value="<?php if(isset($member)) echo $member->getUser()->first_name ?>">
</div>

<div class="form-group col-md-6 w-employee">
<label for="f-cpf">CPF do empregado</label>
<input type="tel" class="form-control cpf f-member f-employee validate[required]" name="member[cpf]" id="f-cpf" value="<?php if(isset($member)) echo $member->getCpf(); ?>">
</div>

<div class="form-group col-md-6 w-employee">
<label for="f-identity">Identidade do empregado</label>
<input type="tel" class="form-control rg f-member f-employee" name="member[identity]" id="f-identity" value="<?php if(isset($member)) echo $member->getMeta('identity'); ?>">
</div>


<div class="form-group col-md-6">
<label for="f-email">E-mail</label>
<input type="email" class="form-control f-member validate[required]" name="member[email]" id="f-email" value="<?php if(isset($member))  echo $member->getEmail(); ?>">
</div>


<div class="form-group col-md-4 w-company <?php if(!isset($member)) echo 'd-none'; ?>">
<label for="f-company">Empresa</label>
<input type="text" class="form-control f-member f-company" name="member[company]" id="f-company" value="<?php if(isset($member))  echo $member->getCompany(); ?>">
</div>

<div class="form-group col-md-4 w-company <?php if(!isset($member)) echo 'd-none'; ?>">
<label for="f-cnpj">CNPJ da empresa</label>
<input type="tel" class="form-control f-member f-company cnpj validate[required]" name="member[cnpj]" id="f-cnpj" value="<?php if(isset($member))  echo $member->getCNPJ(); ?>">
</div>