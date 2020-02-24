<?php if( isset($id) && !empty($id) ): ?>    
    <?php for($k=0; $k < count($id); $k++): ?>
        <tr class="linhaDados">
            <td id="nome"><?php echo $full_name[$k]; ?></td>
            <td id="descricao"><?php echo $description[$k]; ?></td>
            <td id="qtd_estrelas" class="w3-center"><?php echo $stargazers_count[$k]; ?></td>
            <td id="qtd_forks" class="w3-center"><?php echo $forks_count[$k]; ?></td>		
            <td id="autor"><?php echo $owner_login[$k]; ?></td>
            <td id="updated" class="w3-center"><?php echo $updated_at[$k]; ?></td>
        </tr>			
    <?php endfor; ?>
<?php endif; ?>
