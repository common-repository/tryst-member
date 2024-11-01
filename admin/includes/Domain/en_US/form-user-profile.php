<div class="row">
			<div class="form-group col-md-4">
				<label for="f-register"> Matrícula do empregado</label>
				<input type="text" class="form-control regular-text f-member validate[required]" name="member[register]" id="f-name" value="<?php if(isset($member)) echo $member->getUser()->display_name ?>">
			</div>
			<div class="form-group col-md-4">
				<label for="f-cpf">CPF do empregado</label>
				<input type="tel" class="form-control regular-text cpf f-member validate[required]" name="member[cpf]" id="f-cpf" value="<?php if(isset($member)) echo $member->getCpf(); ?>">
			</div>
			<div class="form-group col-md-4">
				<label for="f-identity">Identidade do empregado</label>
				<input type="tel" class="form-control regular-text rg f-member validate[required]" name="member[identity]" id="f-identity" value="<?php if(isset($member)) echo $member->getMeta('identity'); ?>">
			</div>
			<div class="form-group col-md-4">
				<label for="f-company">Empresa</label>
				<input type="text" class="form-control regular-text f-member validate[required]" name="member[company]" id="f-company" value="<?php if(isset($member))  echo $member->getCompany(); ?>">
			</div>
			<div class="form-group col-md-4">
				<label for="f-cnpj">CNPJ da empresa</label>
				<input type="tel" class="form-control regular-text f-member cnpj validate[required]" name="member[cnpj]" id="f-cnpj" value="<?php if(isset($member))  echo $member->getCNPJ(); ?>">
			</div>
			<div class="row">
				<div class="col-12">
					<h6 class="mt-3 t-section">Endereço</h6>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					<label for="zipcode">CEP</label>
					<input type="tel" class="form-control regular-text f-member validate[required]" name="member[zipcode]" id="zipcode" placeholder="Busque endereço pelo CEP" value="<?php echo !empty($member) ? $member->getMeta('zipcode') : ''; ?>"> 
				</div>
				<div class="form-group col-md-4">
					<label for="address_street">Rua/Av</label>
					<input type="text" class="form-control regular-text f-member zipcode-control" name="member[address_street]" id="address_street" value="<?php echo !empty($member) ? $member->getMeta('address_street') : ''; ?>">
				</div>
				<div class="form-group col-md-4">
					<label for="address_district">Bairro</label>
					<input type="text" class="form-control regular-text f-member zipcode-control" name="member[address_district]" id="address_district" value="<?php echo !empty($member) ? $member->getMeta('address_district') : ''; ?>"> 
				</div>
				<div class="form-group col-md-4">
					<label for="address_city">Cidade</label>
					<input type="text" class="form-control regular-text f-member zipcode-control" name="member[address_city]" id="address_city" value="<?php echo !empty($member) ? $member->getMeta('address_city') : ''; ?>"> 
				</div>
				<div class="form-group col-md-4">
					<label for="address_state">UF</label>
					<?php if(!empty($member)): ?>
					<input type="text" class="form-control regular-text" name="member[address_state]" value="<?php if(isset($member)) echo $member->getMeta('address_state') ?>">
					<?php else: ?>
					<select name="member[address_state]" class="form-control regular-text f-member zipcode-control validate[required]" id="address_state" readonly="">
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
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="country">Nacionalidade</label>
				<?php if(!empty($member)): ?>
				<input type="text" class="form-control regular-text" name="member[nationality]" value="<?php if(isset($member)) echo $member->getMeta('nationality') ?>">
				<?php else: ?>
				<select class="form-control regular-text zipcode-control" name="member[nationality]" id="country">
					<option value="" selected="selected">--</option>
					<option value="Afeganistão">Afeganistão</option>
					<option value="África do Sul">África do Sul</option>
					<option value="Albânia">Albânia</option>
					<option value="Alemanha">Alemanha</option>
					<option value="Andorra">Andorra</option>
					<option value="Angola">Angola</option>
					<option value="Anguilla">Anguilla</option>
					<option value="Antilhas Holandesas">Antilhas Holandesas</option>
					<option value="Antárctida">Antárctida</option>
					<option value="Antígua e Barbuda">Antígua e Barbuda</option>
					<option value="Argentina">Argentina</option>
					<option value="Argélia">Argélia</option>
					<option value="Armênia">Armênia</option>
					<option value="Aruba">Aruba</option>
					<option value="Arábia Saudita">Arábia Saudita</option>
					<option value="Austrália">Austrália</option>
					<option value="Áustria">Áustria</option>
					<option value="Azerbaijão">Azerbaijão</option>
					<option value="Bahamas">Bahamas</option>
					<option value="Bahrein">Bahrein</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="Barbados">Barbados</option>
					<option value="Belize">Belize</option>
					<option value="Benim">Benim</option>
					<option value="Bermudas">Bermudas</option>
					<option value="Bielorrússia">Bielorrússia</option>
					<option value="Bolívia">Bolívia</option>
					<option value="Botswana">Botswana</option>
					<option value="Brasil" selected="selected">Brasil</option>
					<option value="Brunei">Brunei</option>
					<option value="Bulgária">Bulgária</option>
					<option value="Burkina Faso">Burkina Faso</option>
					<option value="Burundi">Burundi</option>
					<option value="Butão">Butão</option>
					<option value="Bélgica">Bélgica</option>
					<option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
					<option value="Cabo Verde">Cabo Verde</option>
					<option value="Camarões">Camarões</option>
					<option value="Camboja">Camboja</option>
					<option value="Canadá">Canadá</option>
					<option value="Catar">Catar</option>
					<option value="Cazaquistão">Cazaquistão</option>
					<option value="Chade">Chade</option>
					<option value="Chile">Chile</option>
					<option value="China">China</option>
					<option value="Chipre">Chipre</option>
					<option value="Colômbia">Colômbia</option>
					<option value="Comores">Comores</option>
					<option value="Coreia do Norte">Coreia do Norte</option>
					<option value="Coreia do Sul">Coreia do Sul</option>
					<option value="Costa do Marfim">Costa do Marfim</option>
					<option value="Costa Rica">Costa Rica</option>
					<option value="Croácia">Croácia</option>
					<option value="Cuba">Cuba</option>
					<option value="Dinamarca">Dinamarca</option>
					<option value="Djibouti">Djibouti</option>
					<option value="Dominica">Dominica</option>
					<option value="Egito">Egito</option>
					<option value="El Salvador">El Salvador</option>
					<option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
					<option value="Equador">Equador</option>
					<option value="Eritreia">Eritreia</option>
					<option value="Escócia">Escócia</option>
					<option value="Eslováquia">Eslováquia</option>
					<option value="Eslovênia">Eslovênia</option>
					<option value="Espanha">Espanha</option>
					<option value="Estados Federados da Micronésia">Estados Federados da Micronésia</option>
					<option value="Estados Unidos">Estados Unidos</option>
					<option value="Estônia">Estônia</option>
					<option value="Etiópia">Etiópia</option>
					<option value="Fiji">Fiji</option>
					<option value="Filipinas">Filipinas</option>
					<option value="Finlândia">Finlândia</option>
					<option value="França">França</option>
					<option value="Gabão">Gabão</option>
					<option value="Gana">Gana</option>
					<option value="Geórgia">Geórgia</option>
					<option value="Gibraltar">Gibraltar</option>
					<option value="Granada">Granada</option>
					<option value="Gronelândia">Gronelândia</option>
					<option value="Grécia">Grécia</option>
					<option value="Guadalupe">Guadalupe</option>
					<option value="Guam">Guam</option>
					<option value="Guatemala">Guatemala</option>
					<option value="Guernesei">Guernesei</option>
					<option value="Guiana">Guiana</option>
					<option value="Guiana Francesa">Guiana Francesa</option>
					<option value="Guiné">Guiné</option>
					<option value="Guiné Equatorial">Guiné Equatorial</option>
					<option value="Guiné-Bissau">Guiné-Bissau</option>
					<option value="Gâmbia">Gâmbia</option>
					<option value="Haiti">Haiti</option>
					<option value="Honduras">Honduras</option>
					<option value="Hong Kong">Hong Kong</option>
					<option value="Hungria">Hungria</option>
					<option value="Ilha Bouvet">Ilha Bouvet</option>
					<option value="Ilha de Man">Ilha de Man</option>
					<option value="Ilha do Natal">Ilha do Natal</option>
					<option value="Ilha Heard e Ilhas McDonald">Ilha Heard e Ilhas McDonald</option>
					<option value="Ilha Norfolk">Ilha Norfolk</option>
					<option value="Ilhas Cayman">Ilhas Cayman</option>
					<option value="Ilhas Cocos (Keeling)">Ilhas Cocos (Keeling)</option>
					<option value="Ilhas Cook">Ilhas Cook</option>
					<option value="Ilhas Feroé">Ilhas Feroé</option>
					<option value="Ilhas Geórgia do Sul e Sandwich do Sul">Ilhas Geórgia do Sul e Sandwich do Sul</option>
					<option value="Ilhas Malvinas">Ilhas Malvinas</option>
					<option value="Ilhas Marshall">Ilhas Marshall</option>
					<option value="Ilhas Menores Distantes dos Estados Unidos">Ilhas Menores Distantes dos Estados Unidos</option>
					<option value="Ilhas Salomão">Ilhas Salomão</option>
					<option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
					<option value="Ilhas Virgens Britânicas">Ilhas Virgens Britânicas</option>
					<option value="Ilhas Åland">Ilhas Åland</option>
					<option value="Indonésia">Indonésia</option>
					<option value="Inglaterra">Inglaterra</option>
					<option value="Índia">Índia</option>
					<option value="Iraque">Iraque</option>
					<option value="Irlanda do Norte">Irlanda do Norte</option>
					<option value="Irlanda">Irlanda</option>
					<option value="Irã">Irã</option>
					<option value="Islândia">Islândia</option>
					<option value="Israel">Israel</option>
					<option value="Itália">Itália</option>
					<option value="Iêmen">Iêmen</option>
					<option value="Jamaica">Jamaica</option>
					<option value="Japão">Japão</option>
					<option value="Jersey">Jersey</option>
					<option value="Jordânia">Jordânia</option>
					<option value="Kiribati">Kiribati</option>
					<option value="Kuwait">Kuwait</option>
					<option value="Laos">Laos</option>
					<option value="Lesoto">Lesoto</option>
					<option value="Letônia">Letônia</option>
					<option value="Libéria">Libéria</option>
					<option value="Liechtenstein">Liechtenstein</option>
					<option value="Lituânia">Lituânia</option>
					<option value="Luxemburgo">Luxemburgo</option>
					<option value="Líbano">Líbano</option>
					<option value="Líbia">Líbia</option>
					<option value="Macau">Macau</option>
					<option value="Macedônia">Macedônia</option>
					<option value="Madagáscar">Madagáscar</option>
					<option value="Malawi">Malawi</option>
					<option value="Maldivas">Maldivas</option>
					<option value="Mali">Mali</option>
					<option value="Malta">Malta</option>
					<option value="Malásia">Malásia</option>
					<option value="Marianas Setentrionais">Marianas Setentrionais</option>
					<option value="Marrocos">Marrocos</option>
					<option value="Martinica">Martinica</option>
					<option value="Mauritânia">Mauritânia</option>
					<option value="Maurícia">Maurícia</option>
					<option value="Mayotte">Mayotte</option>
					<option value="Moldávia">Moldávia</option>
					<option value="Mongólia">Mongólia</option>
					<option value="Montenegro">Montenegro</option>
					<option value="Montserrat">Montserrat</option>
					<option value="Moçambique">Moçambique</option>
					<option value="Myanmar">Myanmar</option>
					<option value="México">México</option>
					<option value="Mônaco">Mônaco</option>
					<option value="Namíbia">Namíbia</option>
					<option value="Nauru">Nauru</option>
					<option value="Nepal">Nepal</option>
					<option value="Nicarágua">Nicarágua</option>
					<option value="Nigéria">Nigéria</option>
					<option value="Niue">Niue</option>
					<option value="Noruega">Noruega</option>
					<option value="Nova Caledônia">Nova Caledônia</option>
					<option value="Nova Zelândia">Nova Zelândia</option>
					<option value="Níger">Níger</option>
					<option value="Omã">Omã</option>
					<option value="Palau">Palau</option>
					<option value="Palestina">Palestina</option>
					<option value="Panamá">Panamá</option>
					<option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
					<option value="Paquistão">Paquistão</option>
					<option value="Paraguai">Paraguai</option>
					<option value="País de Gales">País de Gales</option>
					<option value="Países Baixos">Países Baixos</option>
					<option value="Peru">Peru</option>
					<option value="Pitcairn">Pitcairn</option>
					<option value="Polinésia Francesa">Polinésia Francesa</option>
					<option value="Polônia">Polônia</option>
					<option value="Porto Rico">Porto Rico</option>
					<option value="Portugal">Portugal</option>
					<option value="Quirguistão">Quirguistão</option>
					<option value="Quênia">Quênia</option>
					<option value="Reino Unido">Reino Unido</option>
					<option value="República Centro-Africana">República Centro-Africana</option>
					<option value="República Checa">República Checa</option>
					<option value="República Democrática do Congo">República Democrática do Congo</option>
					<option value="República do Congo">República do Congo</option>
					<option value="República Dominicana">República Dominicana</option>
					<option value="Reunião">Reunião</option>
					<option value="Romênia">Romênia</option>
					<option value="Ruanda">Ruanda</option>
					<option value="Rússia">Rússia</option>
					<option value="Saara Ocidental">Saara Ocidental</option>
					<option value="Saint Martin">Saint Martin</option>
					<option value="Saint-Barthélemy">Saint-Barthélemy</option>
					<option value="Saint-Pierre e Miquelon">Saint-Pierre e Miquelon</option>
					<option value="Samoa Americana">Samoa Americana</option>
					<option value="Samoa">Samoa</option>
					<option value="Santa Helena, Ascensão e Tristão da Cunha">Santa Helena, Ascensão e Tristão da Cunha</option>
					<option value="Santa Lúcia">Santa Lúcia</option>
					<option value="Senegal">Senegal</option>
					<option value="Serra Leoa">Serra Leoa</option>
					<option value="Seychelles">Seychelles</option>
					<option value="Singapura">Singapura</option>
					<option value="Somália">Somália</option>
					<option value="Sri Lanka">Sri Lanka</option>
					<option value="Suazilândia">Suazilândia</option>
					<option value="Sudão">Sudão</option>
					<option value="Suriname">Suriname</option>
					<option value="Suécia">Suécia</option>
					<option value="Suíça">Suíça</option>
					<option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
					<option value="São Cristóvão e Nevis">São Cristóvão e Nevis</option>
					<option value="São Marino">São Marino</option>
					<option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
					<option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
					<option value="Sérvia">Sérvia</option>
					<option value="Síria">Síria</option>
					<option value="Tadjiquistão">Tadjiquistão</option>
					<option value="Tailândia">Tailândia</option>
					<option value="Taiwan">Taiwan</option>
					<option value="Tanzânia">Tanzânia</option>
					<option value="Terras Austrais e Antárticas Francesas">Terras Austrais e Antárticas Francesas</option>
					<option value="Território Britânico do Oceano Índico">Território Britânico do Oceano Índico</option>
					<option value="Timor-Leste">Timor-Leste</option>
					<option value="Togo">Togo</option>
					<option value="Tonga">Tonga</option>
					<option value="Toquelau">Toquelau</option>
					<option value="Trinidad e Tobago">Trinidad e Tobago</option>
					<option value="Tunísia">Tunísia</option>
					<option value="Turcas e Caicos">Turcas e Caicos</option>
					<option value="Turquemenistão">Turquemenistão</option>
					<option value="Turquia">Turquia</option>
					<option value="Tuvalu">Tuvalu</option>
					<option value="Ucrânia">Ucrânia</option>
					<option value="Uganda">Uganda</option>
					<option value="Uruguai">Uruguai</option>
					<option value="Uzbequistão">Uzbequistão</option>
					<option value="Vanuatu">Vanuatu</option>
					<option value="Vaticano">Vaticano</option>
					<option value="Venezuela">Venezuela</option>
					<option value="Vietname">Vietname</option>
					<option value="Wallis e Futuna">Wallis e Futuna</option>
					<option value="Zimbabwe">Zimbabwe</option>
					<option value="Zâmbia">Zâmbia</option>
				</select>   
				<?php endif; ?>            
			</div>
			<div class="form-group col-md-4">
				<label for="naturality">Naturalidade</label>
				<input type="text" class="form-control regular-text validate[required]" name="member[naturality]" id="naturality" value="<?php if(isset($member)) { echo $member->getMeta('naturality'); } else { echo 'Brasileiro'; } ?>"> 
			</div>
			<div class="form-group col-md-4">
				<label for="civil_state">Estado Civil</label>
				<select name="member[civil_state]" class="form-control regular-text validate[required]" id="civil_state">
					<option value="">Selecione</option>
					<option  <?php echo ($d->civil_state) == 'Casado(a)'? 'selected' : '' ?> >Casado(a)</option>
					<option  <?php echo ($d->civil_state) == 'Solteiro(a)' ? 'selected' : '' ?> >Solteiro(a)</option>
					<option  <?php echo ($d->civil_state) == 'Divorciado(a)'? 'selected' : '' ?> >Divorciado(a)</option>
					<option  <?php echo ($d->civil_state) == 'Viúvo(a)'? 'selected' : '' ?> >Viúvo(a)</option>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="date_birth">Data de nascimento</label>
				<input type="text" class="form-control regular-text date validate[required, custom[date]]" name="member[date_birth]" id="date_birth" value="<?php if(isset($member)) { echo $member->getMeta('date_birth'); } ?>"> 
			</div>
		</div>
		<div class="row">
			<div class="form-group col-12">
				<h6 class="mt-3 t-section"><?php _e('Parents', 'tryst-member'); ?></h6>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label for="father_name">Nome do pai</label>
				<input type="text" class="form-control regular-text validate[required]" name="member[father_name]" id="father_name" value="<?php if(isset($member)) { echo $member->getMeta('father_name'); } ?>"> 
			</div>
			<div class="form-group col-md-6">
				<label for="mother_name">Nome da mãe</label>
				<input type="text" class="form-control regular-text validate[required]" name="member[mother_name]" id="mother_name" value="<?php if(isset($member)) { echo $member->getMeta('mother_name'); } ?>"> 
			</div>
		</div>
		<div class="row">
			<div class="form-group col-12">
				<h6 class="mt-3 t-section">Dados profissionais</h6>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label class="required" for="profession">Profissão</label>
				<input type="text" class="form-control regular-text validate[required]" name="member[profession]" id="profession" value="<?php if(isset($member)) { echo $member->getMeta('profession'); } ?>"> 
			</div>
			<div class="form-group col-md-4">
				<label class="required" for="instruction_degree">Grau de instrução</label>
				<select name="member[instruction_degree]" class="form-control regular-text validate[required]" id="instruction_degree">
					<option value="">Selecione</option>
					<option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option>
					<option value="Ensino Médio Completo">Ensino Médio Completo</option>
					<option value="Superior Incompleto">Superior Incompleto</option>
					<option value="Superior Completo">Superior Completo</option>
					<option value="Pós-Graduado ">Pós-Graduado </option>
					<option value="Mestrado">Mestrado</option>
					<option value="Doutorado">Doutorado</option>
					<option value="Pós-Doutorado">Pós-Doutorado</option>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label  class="required" for="company">Empresa onde trabalha</label>
				<input type="text" class="form-control regular-text validate[required]" name="member[company]" id="company" value="<?php if(isset($member)) { echo $member->getMeta('company'); } ?>"> 
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="company_address">Endereço</label>
				<input type="text" class="form-control regular-text validate[required]" name="member[company_address]" id="company_address" value="<?php if(isset($member)) { echo $member->getMeta('company_address'); } ?>"> 
			</div>
			<div class="form-group col-md-4">
				<label for="contracted_at">Data de admissão</label>
				<input type="tel" class="form-control regular-text date validate[required, custom[date]]" name="member[contracted_at]" id="contracted_at" value="<?php if(isset($member)) { echo $member->getMeta('contracted_at'); } ?>"> 
			</div>
			<div class="form-group col-md-4">
				<label class="required" for="function">Função</label>
				<input type="text" class="form-control regular-text validate[required]" name="member[function]" id="function" value="<?php if(isset($member)) { echo $member->getMeta('function'); } ?>"> 
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label class="required" for="division">Repartição</label>
				<input type="text" class="form-control regular-text validate[required]" name="member[division]" id="division" value="<?php if(isset($member)) { echo $member->getMeta('division'); } ?>"> 
			</div>
			<div class="form-group col-md-4">
				<label class="required" for="work_permit_number">Número da CTPS</label>
				<input type="tel" class="form-control regular-text validate[required]" name="member[work_permit_number]" id="work_permit_number" value="<?php if(isset($member)) { echo $member->getMeta('work_permit_number'); } ?>"> 
			</div>
			<div class="form-group col-md-4">
				<label class="required" for="work_permit_serie">Série da CTPS</label>
				<input type="tel" class="form-control regular-text validate[required]" name="member[work_permit_serie]" id="work_permit_serie" value="<?php if(isset($member)) { echo $member->getMeta('work_permit_serie'); } ?>">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-12">
				<h6 class="mt-3 t-section">Dados familiares</h6>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">                        
				<label for="partner_name">Nome do(a) cônjuge</label>
				<input type="text" class="form-control regular-text validate[required]" name="member[partner_name]" id="partner_name" value="<?php if(isset($member)) { echo $member->getMeta('partner_name'); } ?>"> 
			</div>
			<div class="form-group col-md-4">
				<label for="partner_birth">Data de nascimento do(a) cônjuge</label>
				<input type="tel" class="form-control regular-text date validate[required, custom[date]]" name="member[partner_birth]" id="partner_birth" value="<?php if(isset($member)) { echo $member->getMeta('partner_birth'); } ?>"> 
			</div>
		</div>
		<?php $dependents = $member->getDependents(); ?>
		<?php foreach($dependents as $k => $d): ?>
		<div class="row">
			<div class="col-12">
				<p class="mt-4"><?php echo $k; ?>° Dependente</p>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="dependent_<?php echo $k; ?>_name">Nome</label>
				<input type="text" class="form-control regular-text validate[required]" name="dependent[<?php echo $k; ?>][name]" placeholder="do dependente" value="<?php echo $d->name;  ?>" > 
			</div>
			<div class="form-group col-md-4">
				<label for="dependent_<?php echo $k; ?>_gender">Sexo</label>
				<select name="dependent[<?php echo $k; ?>][gender]" class="form-control regular-text validate[required]" id="dependent_<?php echo $k; ?>_gender">
					<option value="">Selecione</option>
					<option <?php echo ($d->gender) == 'Masculino'? 'selected' : '' ?> >Masculino</option>
					<option <?php echo ($d->gender) == 'Feminino'? 'selected' : '' ?> >Feminino</option>
				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="dependent_<?php echo $k; ?>_degree">Grau de parentesco</label>
				<input id="dependent_<?php echo $k; ?>_degree" type="text" class="form-control regular-text validate[required]" name="dependent[<?php echo $k; ?>][degree]" placeholder="do dependente"  value="<?php echo $d->degree;  ?>"> 
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="dependent_<?php echo $k; ?>_birth">Data de nascimento</label>
				<input id="dependent_<?php echo $k; ?>_birth" type="text" class="form-control regular-text date validate[required, custom[date]]" name="dependent[<?php echo $k; ?>][birth]" placeholder="do dependente"  value="<?php echo $d->birth;  ?>"> 
			</div>
		</div>
		<?php endforeach; ?>