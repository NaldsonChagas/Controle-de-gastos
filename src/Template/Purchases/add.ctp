<div class="content columns large-10 medium-10">
  <h3>Adicione uma nova compra</h3>

  <?=$this->Form->create('purchase')?>

  <div class="form-group">
    <?= $this->Form->control('title', ['class' => 'form-control'])?>
  </div>

  <div class="form-group">
    <?= $this->Form->control('value', ['class' => 'form-control'])?>
  </div>

  <div class="form-group">
    <input type="checkbox" id="isInstallments"> 
    <label for="isInstallmens">É um valor parcelado</label>
  </div>

  <div class="form-group">
    <select class="form-control">
      <option>Selecione o número de parcelas</option>
    </select>
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <?= $this->Form->textarea('description', ['class' => 'form-control'])?>
  </div>

  <div class="form-group">
    <?= $this->Form->button('Salvar', ['class' => 'btn btn-success'])?>
    <?= $this->Html->link(__('Cancelar'), [
      'controller' => 'users',
      'action' => 'index'], 
      ['class' => 'btn btn-default']);
    ?>
  </div>

  <?=$this->Form->end()?>
</div>