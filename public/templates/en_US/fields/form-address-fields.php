
<div class="row">
<div class="col-12">
<h6 class="mt-3 t-section">Endereço</h6>
</div>
</div>

<div class="row">
<div class="form-group col-md-4">
<label for="zipcode">CEP</label>
<input type="tel" class="form-control f-member validate[required]" name="member[zipcode]" id="zipcode" placeholder="Busque endereço pelo CEP" value="<?php echo !empty($member) ? $member->getMeta('zipcode') : ''; ?>"> 
</div>
<div class="form-group col-md-4">
<label for="address_street">Rua/Av</label>
<input type="text" class="form-control f-member zipcode-control validate[required]" name="member[address_street]" id="address_street" readonly value="<?php echo !empty($member) ? $member->getMeta('address_street') : ''; ?>">
</div>
<div class="form-group col-md-4">

<label for="address_district">Bairro</label>
<input type="text" class="form-control f-member zipcode-control validate[required]" name="member[address_district]" id="address_district" readonly value="<?php echo !empty($member) ? $member->getMeta('address_district') : ''; ?>"> 
</div>

<div class="form-group col-md-4">
<label for="address_city">Cidade</label>
<input type="text" class="form-control f-member zipcode-control validate[required]" name="member[address_city]" id="address_city" readonly value="<?php echo !empty($member) ? $member->getMeta('address_city') : ''; ?>"> 
</div>
<div class="form-group col-md-4">
<label for="address_state">UF</label>
<?php if(!empty($member)): ?>
<input type="text" class="form-control" readonly name="address_state_selected" value="<?php echo $member->getMeta('address_state'); ?>">
<?php else: ?>
<select name="member[address_state]" class="form-control f-member zipcode-control validate[required]" id="address_state" readonly="">
<option value="">Selecione</option>
<option value="AC">Acre</option>
<option value="AL">Alagoas</option>
<option value="AP">Amapá</option>
<option value="AM">Amazonas</option>
<option value="BA">Bahia</option>
<option value="CE">Ceará</option>
<option value="DF">Distrito Federal</option>
<option value="ES">Espirito Santo</option>
<option value="GO">Goiás</option>
<option value="MA">Maranhão</option>
<option value="MS">Mato Grosso do Sul</option>
<option value="MT">Mato Grosso</option>
<option value="MG">Minas Gerais</option>
<option value="PA">Pará</option>
<option value="PB">Paraíba</option>
<option value="PR">Paraná</option>
<option value="PE">Pernambuco</option>
<option value="PI">Piauí</option>
<option value="RJ">Rio de Janeiro</option>
<option value="RN">Rio Grande do Norte</option>
<option value="RS">Rio Grande do Sul</option>
<option value="RO">Rondônia</option>
<option value="RR">Roraima</option>
<option value="SC">Santa Catarina</option>
<option value="SP">São Paulo</option>
<option value="SE">Sergipe</option>
<option value="TO">Tocantins</option>
</select>
<?php endif; ?>
</div>
</div>