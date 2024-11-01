<?php include realpath(dirname( __FILE__ )).'/../include_scripts.php'; ?>
<div class="header row">
    <div class="col-12 text-center">
        <h1>Torne-se Sócio</h1>
    </div>
    <div class="alert bg-light text-intro col-md-12 m-auto">
        <p>O que o sindicato lhe oferece:<br>
            A  entidade sindical existe para organizar e orientar a luta dos trabalhadores, defender seus interesses diante dos empregadores e representá-los nas negociações coletivas.
            Além da preocupação com o cumprimento do que reza a lei trabalhista, o SITRAMICO/MG reivindica a manutenção das conquistas históricas do empregados da categoria, além de permanentemente buscar a conquista de novas garantias e direitos que sejam consagrados nos Acordos e Convenções Coletivas de Trabalho (ACT e CCT ). Além disso oferece outros benefícios aos seus sindicalizados como assessoria jurídica, assistência médica e outros.
            O trabalhador que se sindicaliza,  fortalece o seu sindicato, a si mesmo e a luta da sua classe, contribuindo para que haja uma entidade sindical forte que fiscalize de maneira efetiva as suas condições de trabalho, direitos e deveres.
            <br> Torne-se sócio!</p>
        </div>
    </div>
    <form action="<?php echo get_page_link(); ?>" method="POST" class="validate my-4  <?php if(isset($_GET['tryst_member_key'])): ?> readonly <?php endif; ?>">
        <?php wp_nonce_field( 'member', 'member_nonce_field' ); ?>
        <?php if(isset($_GET['tryst_member_key'])): ?>
        <input type="hidden" name="tryst_hash" value="<?php echo sanitize_text_field($_GET['tryst_member_key']);  ?>">
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <h6 class="mt-3 t-section w-employee"><?php _e('Worker data', 'tryst-member'); ?></h6>
            </div>
        </div>

        <div class="row">
        <?php 
            global $tryst_plugin;
            $options = get_option('tryst_option');
            if(!empty($tryst_plugin) && $tryst_plugin->isExtensionActive('member')){
                include $tryst_plugin->getExtensionPath('member')."/public/templates/".$options['form_country']."/fields/base-fields.php"; 
                if(class_exists("\\Tryst\\Domain\\Main")) {
                    include $tryst_plugin->getExtensionPath('member')."/public/templates/".$options['form_country']."/Domain/fields/base-fields.php";  
                }
            }
        ?>
        </div>
  
        <div class="row">
            <div class="form-group col-md-4">
                <label for="country">Nacionalidade</label>
                <?php include realpath(dirname( __FILE__ )).'/countries.html'; ?>
                <!-- <input type="text" class="form-control validate[required]" name="member[nacionalidade" id="nacionalidade"> -->                   
            </div>
            <div class="form-group col-md-4">
                <label for="naturality">Naturalidade</label>
                <input type="text" class="form-control validate[required]" name="member[naturality]" id="naturality" value="Brasileiro"> 
            </div>
            <div class="form-group col-md-4">
                <label for="civil_state">Estado Civil</label>
                <select name="member[civil_state]" class="form-control validate[required]" id="civil_state">
                    <option value="">Selecione</option>
                    <option>Casado(a)</option>
                    <option>Solteiro(a)</option>
                    <option>Divorciado(a)</option>
                    <option>Viúvo(a)</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="date_birth">Data de nascimento</label>
                <input type="text" class="form-control date validate[required, custom[date]]" name="member[date_birth]" id="date_birth"> 
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
                <input type="text" class="form-control validate[required]" name="member[father_name]" id="father_name"> 
            </div>
            <div class="form-group col-md-6">
                <label for="mother_name">Nome da mãe</label>
                <input type="text" class="form-control validate[required]" name="member[mother_name]" id="mother_name"> 
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
                <input type="text" class="form-control validate[required]" name="member[profession]" id="profession"> 
            </div>
            <div class="form-group col-md-4">
                <label class="required" for="instruction_degree">Grau de instrução</label>
                <select name="member[instruction_degree]" class="form-control validate[required]" id="instruction_degree">
                    <option value="">Selecione</option>
                    <option value="Ensino Médio Incompleto">Ensino Médio Incompleto</option><option value="Ensino Médio Completo">Ensino Médio Completo</option><option value="Superior Incompleto">Superior Incompleto</option><option value="Superior Completo">Superior Completo</option><option value="Pós-Graduado ">Pós-Graduado </option><option value="Mestrado">Mestrado</option><option value="Doutorado">Doutorado</option><option value="Pós-Doutorado">Pós-Doutorado</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label  class="required" for="company">Empresa onde trabalha</label>
                <input type="text" class="form-control validate[required]" name="member[company]" id="company"> 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="company_address">Endereço</label>
                <input type="text" class="form-control validate[required]" name="member[company_address]" id="company_address"> 
            </div>
            <div class="form-group col-md-4">
                <label for="contracted_at">Data de admissão</label>
                <input type="tel" class="form-control date validate[required, custom[date]]" name="member[contracted_at]" id="contracted_at"> 
            </div>
            <div class="form-group col-md-4">
                <label class="required" for="function">Função</label>
                <input type="text" class="form-control validate[required]" name="member[function]" id="function"> 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label class="required" for="division">Repartição</label>
                <input type="text" class="form-control" name="member[division]" id="division"> 
            </div>
            <div class="form-group col-md-4">
                <label class="required" for="work_permit_number">Número da CTPS</label>
                <input type="tel" class="form-control validate[required]" name="member[work_permit_number]" id="work_permit_number"> 
            </div>
            <div class="form-group col-md-4">
                <label class="required" for="work_permit_serie">Série da CTPS</label>
                <input type="tel" class="form-control validate[required]" name="member[work_permit_serie]" id="work_permit_serie">
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
                <input type="text" class="form-control" name="member[partner_name]" id="partner_name"> 
            </div>
            <div class="form-group col-md-4">
                <label for="partner_birth">Data de nascimento do(a) cônjuge</label>
                <input type="tel" class="form-control date validate[custom[date]]" name="member[partner_birth]" id="partner_birth"> 
            </div>
        </div>
        <?php for($c = 1; $c <=4; $c++): ?>
        <div class="row">
            <div class="col-12">
                <p class="mt-4"><?php echo $c; ?>° Dependente</p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="dependent_<?php echo $c; ?>_name">Nome</label>
                <input type="text" class="form-control" name="dependent[<?php echo $c; ?>][name]" placeholder="do dependente"> 
            </div>
            <div class="form-group col-md-4">
                <label for="dependent_<?php echo $c; ?>_gender">Sexo</label>
                <select name="dependent[<?php echo $c; ?>][gender]" class="form-control" id="dependent_<?php echo $c; ?>_gender">
                    <option value="">Selecione</option>
                    <option>Masculino</option>
                    <option>Feminino</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="dependent_<?php echo $c; ?>_degree">Grau de parentesco</label>
                <input id="dependent_<?php echo $c; ?>_degree" type="text" class="form-control" name="dependent[<?php echo $c; ?>][degree]" placeholder="do dependente"> 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="dependent_<?php echo $c; ?>_birth">Data de nascimento</label>
                <input id="dependent_<?php echo $c; ?>_birth" type="text" class="form-control date validate[custom[date]]" name="dependent[<?php echo $c; ?>][birth]" placeholder="do dependente"> 
            </div>
            <div class="form-group col-md-4">
            </div>
            <div class="form-group col-md-4">
            </div>
        </div>
        <?php endfor; ?>
        <?php if(!isset($member)): ?>
        <div class="text-center mt-4 form-group">
            <label for="f-security-code">Código anti-spam</label>
        </div>
        <div class="row">
            <div class="col-4 text-right">
                <span class="badge badge-info t-code"><?php echo substr(strtotime('now'), -3); ?></span>
            </div>
            <div class="col-8 col-md-4">
                <input type="hidden" name="security_code" id="f-security-code" value="<?php echo substr(strtotime('now'), -3); ?>">
                <input required type="text" class="form-control , validate[required, equals[f-security-code]]" name="security_code_repeat" id="f-security-code-repeat" placeholder="<?php echo 'Digite o número '.substr(strtotime('now'), -3); ?>"> 
                <small class="form-text text-muted"><?php _e('Simple captcha to help us avoid robot spam', 'tryst-member'); ?></small>
            </div>
        </div>
        <?php endif; ?>
        <hr>
        <div class="row">
            <div class="col-12 offset-md-6 col-md-6 mb-3">
                <input type="submit" value="Enviar" class="pure-button pure-button-primary btn-primary btn float-right"> 
            </div>
        </div>
    </form>
    