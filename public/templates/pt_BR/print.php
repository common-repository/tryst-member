<div class="alert alert-warning no-print">
    <?php _e('Please print this page, sign the specified fields and send it to us scanned via e-mail.', 'tryst-member')?>
</div>

<table class="table">
    <tbody>
        <tr>
            <th colspan="4">Proposta de associação</th>
        </tr>
        <tr>
            <th>Matrícula</th>
            <td colspan="3"><?php echo $member->getUser()->ID; ?></td>
        </tr>
        <tr>
            <th>Rua/Av</th>
            <td colspan="3"><?php echo $member->getMeta('address_street'); ?></td>
        </tr>
        <tr>
            <th><?php _e('Address District', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('address_district'); ?></td>
            <th><?php _e('City', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('address_city'); ?></td>
        </tr>
        <tr>
            <th><?php _e('Phone', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('phone'); ?></td>
            <th><?php _e('Zipcode', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('zipcode'); ?></td>
        </tr>
        <tr>
            <th><?php _e('Nationality', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('nationality'); ?></td>
            <th><?php _e('Civil State', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('civil_state'); ?></td>
        </tr>
        <tr>
            <th><?php _e('Naturality', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('naturality'); ?></td>
            <th><?php _e('E-mail'); ?></th>
            <td><?php echo $member->getEmail(); ?></td>
        </tr>
        <tr>
            <th colspan="4"><?php _e('Parents', 'tryst-member'); ?></th>
        </tr>
        <tr>
            <th><?php _e('Father Name', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('father_name'); ?></td>
            <th><?php _e('Mother Name', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('mother_name'); ?></td>
        </tr>
        <tr>
            <th><?php _e('Birth Date', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('date_birth'); ?></td>
            <th><?php _e('Profession', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('profession'); ?></td>
        </tr>
        <tr>
            <th><?php _e('Instruction Degree', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('instruction_degree'); ?></td>
            <th><?php _e('Company', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('company'); ?></td>
        </tr>
        <tr>
            <th><?php _e('Company Address', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('company_address'); ?></td>
            <th><?php _e('Contracted At', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('contracted_at'); ?></td>
        </tr>
        <tr>
            <th><?php _e('Function', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('function'); ?></td>
            <th><?php _e('Work Permit Number', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('work_permit_number'); ?></td>
        </tr>
        
        <tr>
            <th><?php _e('Work Permit Serie', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('work_permit_serie'); ?></td>
            <th><?php _e('Identity', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('identity'); ?></td>
        </tr>
        <tr>
            <th><?php _e('Division', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('division'); ?></td>
            <th><?php _e('CPF', 'tryst-member'); ?></th>
            <td><?php echo $member->getMeta('cpf'); ?></td>
        </tr>
    </tbody>
</table>

<div>
    <table class="table">
        <tbody>
            <tr>
                <th colspan="2"><?php _e('Authorization', 'tryst-member'); ?></th>
            </tr>
            <tr>
                <th colspan="2">
                    <p>
                        Eu, <u><?php echo $member->getName(); ?></u>, N° MATRÍCULA FUNCIONAL <u><?php echo $member->getUser()->ID; ?></u>, CARTEIRA PROF.: <u><?php echo $member->getMeta('work_permit_number'); ?></u>, SÉRIE <u><?php echo $member->getMeta('work_permit_serie'); ?></u>, em atenção aos termos do artigo 545 da CLT e na qualidade de sócio do Sindicato dos Trabalhadores no Comércio de Minérios e Derivados de Petróleo no Estado de Minas Gerais – SITRAMICO-MG, venho pela presente autorizar a empresa <u><?php echo $member->getMeta('company'); ?></u> a descontar do meu salário as contribuições devidas à referida entidade sindical, na forma e valor estabelecidos por suas Assembléias Gerais Regulares. 
                    </p>
                </th>
            </tr>
            <tr>
                <td>
                    Data <u><?php echo date('d \d\e F \d\e Y'); ?></u>
                </td>
                <th style="text-align:center;border:0px;">
                    <div class="box-signature">
                        Assinatura
                    </div>
                </th>
            </tr>
        </tbody>
    </table>
</div>

<table class="table">
    <tbody>
        <tr>
            <th colspan="4"><?php _e('Dependents', 'tryst-member'); ?></th>
        </tr>
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Grau de parentesco</th>
            <th>Data de nascimento</th>
        </tr>
        <?php
        $dependents = $member->getDependents();
        
        foreach($dependents as $d):
        if(empty($d))
        continue;
        ?>
        <tr>
            <td><?php echo $d->name; ?></td>
            <td><?php echo $d->gender; ?></td>
            <td><?php echo $d->degree; ?></td>
            <td><?php echo $d->birth; ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>