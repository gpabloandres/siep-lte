<!-- PASO 1-->
<div class="box box-default">
  <div class="box-header with-border">
      <h3 class="box-title">Buscar persona</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form>
      <div class="box-body">
          @include('widget.autocomplete_personas')
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
          <input type="hidden" value="2" name="paso">
          <button type="submit" class="btn btn-success pull-right">Continuar</button>
      </div>
      <!-- /.box-footer -->
  </form>
</div>
