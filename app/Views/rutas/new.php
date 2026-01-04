<link href="<?= base_url() ?>/public/plugins/jstree/dist/themes/default/style.min.css" rel="stylesheet">
<style>
  .permission-type-card {
    border: 2px solid transparent;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-bottom: 15px;
  }
  .permission-type-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  }
  .permission-type-card.selected {
    border-color: #007bff;
    background-color: #f8f9fa;
  }
  .icon-preview {
    font-size: 24px;
    margin-right: 10px;
  }
  .form-section {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
  }
  .step-indicator {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
  }
  .step {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #ddd;
    color: #999;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 10px;
    font-weight: bold;
  }
  .step.active {
    background: #007bff;
    color: white;
  }
  .step.completed {
    background: #28a745;
    color: white;
  }
</style>

<ol class="breadcrumb pull-right">
  <li class="breadcrumb-item"><a href="#index/home">Inicio</a></li>
  <li class="breadcrumb-item"><a href="#rutas">Lista de permisos</a></li>
  <li class="breadcrumb-item active">Nuevo Permiso</li>
</ol>
<h2 class="page-header"><i class="fas fa-plus-circle"></i> Crear Nuevo Permiso</h2>

<div class="panel panel-blue">
  <div class="panel-heading">
    <h4 class="panel-title"><i class="fas fa-shield-alt"></i> Configuración de Permiso</h4>
  </div>
  <div class="panel-body">
    
    <!-- Indicador de Pasos -->
    <div class="step-indicator">
      <div class="step active" id="step1">1</div>
      <div class="step" id="step2">2</div>
      <div class="step" id="step3">3</div>
    </div>

    <form id="permission-form">
      <!-- Paso 1: Selección del Tipo -->
      <div class="form-step" id="step-1">
        <h4 class="text-center mb-4"><i class="fas fa-magic"></i> ¿Qué tipo de permiso deseas crear?</h4>
        
        <div class="row">
          <div class="col-md-4">
            <div class="card permission-type-card" data-type="padre-normal">
              <div class="card-body text-center">
                <div class="icon-preview">
                  <i class="fas fa-folder text-primary"></i>
                </div>
                <h5 class="card-title">Permiso Padre</h5>
                <p class="card-text">Un módulo principal que puede tener sub-permisos</p>
                <span class="badge badge-primary">Recomendado</span>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card permission-type-card" data-type="hijo-normal">
              <div class="card-body text-center">
                <div class="icon-preview">
                  <i class="fas fa-file text-success"></i>
                </div>
                <h5 class="card-title">Permiso Hijo</h5>
                <p class="card-text">Una sub-funcionalidad que pertenece a un módulo padre</p>
                <span class="badge badge-success">Común</span>
              </div>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="card permission-type-card" data-type="especial">
              <div class="card-body text-center">
                <div class="icon-preview">
                  <i class="fas fa-star text-warning"></i>
                </div>
                <h5 class="card-title">Permiso Especial</h5>
                <p class="card-text">Un permiso con características especiales del sistema</p>
                <span class="badge badge-warning">Avanzado</span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="text-center mt-4">
          <button type="button" class="btn btn-primary btn-lg" id="btn-next-1" disabled>
            <i class="fas fa-arrow-right"></i> Continuar
          </button>
        </div>
      </div>

      <!-- Paso 2: Información Básica -->
      <div class="form-step" id="step-2" style="display: none;">
        <div class="form-section">
          <h4><i class="fas fa-info-circle"></i> Información Básica</h4>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nombre"><i class="fas fa-tag"></i> Nombre del Permiso *</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ej: Gestión de Usuarios" required>
                <small class="form-text text-muted">El nombre debe ser descriptivo y único</small>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="descripcion"><i class="fas fa-align-left"></i> Descripción</label>
                <input type="text" class="form-control" id="descripcion" placeholder="Breve descripción del permiso">
                <small class="form-text text-muted">Opcional: ayuda a entender el propósito</small>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Sección Padre (solo para permisos hijo) -->
        <div class="form-section" id="parent-section" style="display: none;">
          <h4><i class="fas fa-sitemap"></i> Relación Jerárquica</h4>
          <div class="form-group">
            <label for="padre"><i class="fas fa-folder-open"></i> Permiso Padre *</label>
            <select id="padre" class="form-control" required>
              <option value="">Selecciona el permiso padre...</option>
              <?php foreach ($data as $datos) : ?>
                <option value="<?= $datos->id_permiso ?>"><?= $datos->modulo ?></option>
              <?php endforeach ?>
            </select>
            <small class="form-text text-muted">El módulo padre al que pertenecerá este permiso</small>
          </div>
        </div>
        
        <div class="text-center">
          <button type="button" class="btn btn-secondary" id="btn-back-2">
            <i class="fas fa-arrow-left"></i> Anterior
          </button>
          <button type="button" class="btn btn-primary btn-lg ml-2" id="btn-next-2">
            <i class="fas fa-arrow-right"></i> Continuar
          </button>
        </div>
      </div>

      <!-- Paso 3: Configuración Técnica -->
      <div class="form-step" id="step-3" style="display: none;">
        <div class="form-section" id="technical-section">
          <h4><i class="fas fa-cogs"></i> Configuración Técnica</h4>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="url"><i class="fas fa-link"></i> URL del Permiso *</label>
                <input type="text" class="form-control" id="url" placeholder="Ej: usuarios/gestionar" required>
                <small class="form-text text-muted">La ruta o URL asociada al permiso</small>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="imagen"><i class="fas fa-icons"></i> Icono</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="imagen" placeholder="fas fa-users" value="fas fa-folder">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-outline-secondary" id="btn-preview-icon">
                      <i class="fas fa-eye"></i> Preview
                    </button>
                  </div>
                </div>
                <div class="mt-2">
                  <small class="form-text text-muted">
                    Vista previa: <span id="icon-preview" class="ml-2"><i class="fas fa-folder"></i></span>
                  </small>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Sugerencias de iconos -->
          <div class="mt-3">
            <label>Iconos sugeridos:</label>
            <div class="btn-group-toggle" data-toggle="buttons">
              <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fas fa-users">
                <i class="fas fa-users"></i> Usuarios
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fas fa-cog">
                <i class="fas fa-cog"></i> Configuración
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fas fa-chart-bar">
                <i class="fas fa-chart-bar"></i> Reportes
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fas fa-file-alt">
                <i class="fas fa-file-alt"></i> Documentos
              </button>
              <button type="button" class="btn btn-sm btn-outline-secondary icon-suggestion" data-icon="fas fa-shield-alt">
                <i class="fas fa-shield-alt"></i> Seguridad
              </button>
            </div>
          </div>
        </div>
        
        <!-- Resumen Final -->
        <div class="form-section">
          <h4><i class="fas fa-check-circle"></i> Resumen</h4>
          <div id="summary-content">
            <!-- Se llenará dinámicamente -->
          </div>
        </div>
        
        <div class="text-center">
          <button type="button" class="btn btn-secondary" id="btn-back-3">
            <i class="fas fa-arrow-left"></i> Anterior
          </button>
          <button type="submit" class="btn btn-success btn-lg ml-2" id="btn-save">
            <i class="fas fa-save"></i> Guardar Permiso
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="<?= base_url() ?>/public/plugins/jstree/dist/jstree.min.js"></script>
<script>
$(document).ready(function() {
  let selectedType = '';
  let currentStep = 1;

  // Manejo de selección de tipo de permiso
  $('.permission-type-card').click(function() {
    $('.permission-type-card').removeClass('selected');
    $(this).addClass('selected');
    selectedType = $(this).data('type');
    $('#btn-next-1').prop('disabled', false);
  });

  // Navegación entre pasos
  $('#btn-next-1').click(function() {
    if (selectedType) {
      showStep(2);
      setupStep2();
    }
  });

  $('#btn-back-2').click(function() {
    showStep(1);
  });

  $('#btn-next-2').click(function() {
    if (validateStep2()) {
      showStep(3);
      generateSummary();
    }
  });

  $('#btn-back-3').click(function() {
    showStep(2);
  });

  // Configurar paso 2 según el tipo seleccionado
  function setupStep2() {
    if (selectedType === 'hijo-normal' || selectedType === 'especial') {
      $('#parent-section').show();
      $('#padre').prop('required', true);
    } else {
      $('#parent-section').hide();
      $('#padre').prop('required', false);
      $('#padre').val('0');
    }
  }

  // Mostrar paso específico
  function showStep(step) {
    $('.form-step').hide();
    $('#step-' + step).show();
    
    // Actualizar indicadores
    $('.step').removeClass('active completed');
    for (let i = 1; i < step; i++) {
      $('#step' + i).addClass('completed');
    }
    $('#step' + step).addClass('active');
    
    currentStep = step;
  }

  // Validar paso 2
  function validateStep2() {
    let valid = true;
    
    if (!$('#nombre').val().trim()) {
      $('#nombre').addClass('is-invalid');
      valid = false;
    } else {
      $('#nombre').removeClass('is-invalid');
    }
    
    if ((selectedType === 'hijo-normal' || selectedType === 'especial') && !$('#padre').val()) {
      $('#padre').addClass('is-invalid');
      valid = false;
    } else {
      $('#padre').removeClass('is-invalid');
    }
    
    if (!valid) {
      alerta('error', 'Por favor completa los campos requeridos');
    }
    
    return valid;
  }

  // Generar resumen
  function generateSummary() {
    let typeLabels = {
      'padre-normal': '<span class="badge badge-primary"><i class="fas fa-folder"></i> Permiso Padre</span>',
      'hijo-normal': '<span class="badge badge-success"><i class="fas fa-file"></i> Permiso Hijo</span>',
      'especial': '<span class="badge badge-warning"><i class="fas fa-star"></i> Permiso Especial</span>'
    };
    
    let parentName = '';
    if (selectedType === 'hijo-normal' || selectedType === 'especial') {
      parentName = $('#padre option:selected').text();
    }
    
    let summaryHtml = `
      <div class="alert alert-info">
        <h5><i class="fas fa-info-circle"></i> Configuración del Permiso</h5>
        <hr>
        <p><strong>Tipo:</strong> ${typeLabels[selectedType]}</p>
        <p><strong>Nombre:</strong> ${$('#nombre').val()}</p>
        <p><strong>Descripción:</strong> ${$('#descripcion').val() || 'Sin descripción'}</p>
        ${parentName ? `<p><strong>Permiso Padre:</strong> ${parentName}</p>` : ''}
        <p><strong>URL:</strong> ${$('#url').val() || 'Pendiente de configurar'}</p>
        <p><strong>Icono:</strong> <span id="final-icon-preview"><i class="${$('#imagen').val()}"></i></span> ${$('#imagen').val()}</p>
      </div>
    `;
    
    $('#summary-content').html(summaryHtml);
  }

  // Preview de iconos
  $('#imagen').on('input', function() {
    let iconClass = $(this).val();
    $('#icon-preview').html(`<i class="${iconClass}"></i>`);
  });

  $('#btn-preview-icon').click(function() {
    let iconClass = $('#imagen').val();
    $('#icon-preview').html(`<i class="${iconClass}"></i>`);
  });

  // Sugerencias de iconos
  $('.icon-suggestion').click(function() {
    let iconClass = $(this).data('icon');
    $('#imagen').val(iconClass);
    $('#icon-preview').html(`<i class="${iconClass}"></i>`);
  });

  // Auto-completar URL basado en el nombre
  $('#nombre').on('input', function() {
    if (!$('#url').val()) {
      let urlSuggestion = $(this).val().toLowerCase()
        .replace(/[^a-z0-9\s]/g, '')
        .replace(/\s+/g, '_');
      $('#url').val(urlSuggestion);
    }
  });

  // Envío del formulario
  $('#permission-form').submit(function(e) {
    e.preventDefault();
    
    if (!validateStep2() || !$('#url').val().trim()) {
      alerta('error', 'Por favor completa todos los campos requeridos');
      return;
    }
    
    let formData = {
      'nombre': $('#nombre').val(),
      'descripcion': $('#descripcion').val(),
      'imagen': $('#imagen').val(),
      'url': selectedType === 'especial' ? '' : $('#url').val(),
      'padre': $('#padre').val() || '0',
      'especial': selectedType === 'especial' ? 2 : 1
    };
    
    // Mostrar loading
    $('#btn-save').html('<i class="fas fa-spinner fa-spin"></i> Guardando...').prop('disabled', true);
    
    $.post(base_url + 'rutas/create_ruta', formData, function(data) {
      if (data == "1") {
        alerta('exito', 'Permiso creado exitosamente');
        setTimeout(function() {
          $(location).attr('href', base_url + "#rutas/index");
        }, 1500);
      } else {
        alerta('error', 'Error al crear el permiso');
        $('#btn-save').html('<i class="fas fa-save"></i> Guardar Permiso').prop('disabled', false);
      }
    }).fail(function() {
      alerta('error', 'Error de conexión');
      $('#btn-save').html('<i class="fas fa-save"></i> Guardar Permiso').prop('disabled', false);
    });
  });
});
</script>