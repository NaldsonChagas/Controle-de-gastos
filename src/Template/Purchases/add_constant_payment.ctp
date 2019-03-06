
<h3>Adicionar um novo serviço</h3>
<p class="text-muted">Adicione aqui serviços com pagamentos recorrentes.</p>

<?=$this->Form->create('purchase')?>

  <div class="form-group">
    <?= $this->Form->control('title', ['class' => 'form-control'])?>
  </div>

  <div class="form-group">
    <?= $this->Form->control('value', ['class' => 'form-control'])?>
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <?= $this->Form->textarea('description', ['class' => 'form-control'])?>
  </div>

  <div class="form-group">
    <label for="created">Accession date</label>
    <input type="date" name="created" id="created" required class="form-control">
  </div>

  <div class="form-group">
    <?= $this->Form->button('Salvar', ['class' => 'btn btn-success'])?>
    <?= $this->Html->link(__('Cancelar'), [
      'controller' => 'welcome',
      'action' => 'index'], 
      ['class' => 'btn btn-default']);
    ?>
  </div>

  <?=$this->Form->end()?>
</div>