@extends('layouts.base')

@section('customcss')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/authentication.css')}}">



 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<script>
  $( function() {
    $( "#birthday" ).datepicker();
  } );

//função para limitar os caracteres do campo cpf
  function limitarInput(obj) {
    obj.value = obj.value.substring(0,14);
  }
var spinner = $('.loading-spinner');

$('#click-me').on("click", function(){
  spinner.addClass('active'); // ativa o loading
  
  // Espera 5 segundos e desativa o loading
  setTimeout(function(){
    spinner.removeClass('active'); 
  }, 5000);
});
  </script>
<style>
    .authentication-wrapper.authentication-2 .authentication-inner {
        max-width: 500px;
    }

.loader {
  position: relative;
  text-align: center;
  margin: 15px auto 35px auto;
  z-index: 9999;
  display: block;
  width: 80px;
  height: 80px;
  border: 10px solid rgba(0, 0, 0, .3);
  border-radius: 50%;
  border-top-color: aquamarine;
  animation: spin 1s ease-in-out infinite;
  -webkit-animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
  to {
    -webkit-transform: rotate(360deg);
  }
}

@-webkit-keyframes spin {
  to {
    -webkit-transform: rotate(360deg);
  }
}


/** MODAL STYLING **/

.modal-content {
  border-radius: 0px;
  box-shadow: 0 0 20px 8px rgba(0, 0, 0, 0.7);
}

.modal-backdrop.show {
  opacity: 0.75;
}

.loader-txt {
  p {
    font-size: 13px;
    color: #666;
    small {
      font-size: 11.5px;
      color: #999;
    }
  }
}

#output {
  padding: 25px 15px;
  background: #222;
  border: 1px solid #222;
  max-width: 350px;
  margin: 35px auto;
  font-family: 'Roboto', sans-serif !important;
  p.subtle {
    color: #555;
    font-style: italic;
    font-family: 'Roboto', sans-serif !important;
  }

</style>
@endsection

@section('content')
<div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4"
    style="background-image: url('{{asset('assets/img/bg-auth.jpg')}}');">
    <div class="ui-bg-overlay bg-success opacity-25"></div>

    <div class="authentication-inner py-5">

        <div class="">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible my-3" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="nav-tabs-top nav-responsive-xl">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active text-dark" data-toggle="tab"
                            href="#navs-top-responsive-link-1">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" data-toggle="tab" href="#navs-top-responsive-link-2">Cadastro</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active p-5" id="navs-top-responsive-link-1">
                        <h5 class="text-center text-muted font-weight-normal mb-4">Acesso do Profissional</h5>

                        <!-- Form -->
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="" class="label-form">E-mail*</label>
                                <input type="email" name="email" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-form">Senha*</label>
                                <input type="password" name="password" id="" class="form-control" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center m-0">
                                
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>
                        <!-- / Form -->
                    </div>
                    <div class="tab-pane fade p-5" id="navs-top-responsive-link-2">
                        <h5 class="text-center text-muted font-weight-normal mb-4">Cadastro Profissional</h5>

                        <!-- Form -->
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <input type="hidden" name="user_type" value="1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-form">Nome*</label>
                                        <input type="text" name="name" id="" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-form">Sobrenome*</label>
                                        <input type="text" name="last_name" id="" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                                <label for="" class="label-form">Data de Nascimento*</label>
                                <input type="text" name="birthday" id="birthday" class="form-control"   onkeyUp="mascaraData(this)"; required>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-form">Documento*</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <select name="document" id="" class="form-control" required>
                                            <option value="1">RG</option>
                                            <option value="2">Passaporte</option>
                                        </select>
                                    </div>
                                    <input type="text" name="document_number" class="form-control" placeholder=""
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-form">Sexo*</label>
                                        <select name="gender" id="" class="form-control" required>
                                            <option value="1">Masculino</option>
                                            <option value="2">Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-form">CPF*</label>
                                        <input type="text" name="cpf" id="" maxlenght="15"class="form-control" required  onkeypress="$(this).mask('000.000.000-00');" onkeydown="javascript: fMasc( this, mCPF );" onkeyup="limitarInput(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-form">Tipo de Profissional*</label>
                                        <select name="professional_type" id="" class="form-control" required>
                                            <option value="">Selecione..</option>
                                            @foreach (App\Helpers\Data::PROFESSIONAL_TYPE as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="label-form">Área de atuação</label>
                                        <select name="occupation_area" id="" class="form-control">
                                            <option value="">Selecione..</option>
                                            @foreach (App\Helpers\Data::OCCUPATION_AREA as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-form">Número do Conselho*</label>
                                <input type="text" name="council_number" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-form">País</label>
                                <select name="country" id="load_me_baby" class="form-control"  onchange="getRegions(this.value)"
                                    required>
                                                                         <option value="AF"  >
                                        Afeganistão </option>
                                                                        <option value="AL"  >
                                        Albânia</option>
                                                                        <option value="DZ"  >
                                        Argélia </option>
                                                                        <option value="AD"  >
                                        Andorra</option>
                                                                        <option value="AO"  >
                                        Angola</option>
                                                                        <option value="AG"  >
                                        Antígua e Barbuda </option>
                                                                        <option value="AR"  >
                                        Argentina</option>
                                                                        <option value="AW"  >
                                        Aruba</option>
                                                                        <option value="AU"  >
                                        Austrália</option>
                                                                        <option value="AT"  >
                                        Áustria </option>
                                                                        <option value="BS"  >
                                        Bahamas</option>
                                                                        <option value="BB"  >
                                        Barbados</option>
                                                                        <option value="BE"  >
                                        Bélgica </option>
                                                                        <option value="BZ"  >
                                        Belize</option>
                                                                        <option value="BM"  >
                                        Bermudas </option>
                                                                        <option value="BO"  >
                                        Bolívia </option>
                                                                        <option value="BR" selected >
                                        Brasil</option>
                                                                        <option value="CA"  >
                                        Canadá </option>
                                                                        <option value="CL"  >
                                        Chile</option>
                                                                        <option value="CN"  >
                                        China</option>
                                                                        <option value="CO"  >
                                        Colômbia </option>
                                                                        <option value="CR"  >
                                        Costa Rica</option>
                                                                        <option value="HR"  >
                                        Croácia </option>
                                                                        <option value="CU"  >
                                        Cuba</option>
                                                                        <option value="CZ"  >
                                        República Tcheca</option>
                                                                        <option value="DK"  >
                                        Dinamarca </option>
                                                                        <option value="DO"  >
                                        República Dominicana</option>
                                                                        <option value="EC"  >
                                        Equador</option>
                                                                        <option value="SV"  >
                                        El Salvador</option>
                                                                        <option value="GQ"  >
                                        Guiné Equatorial</option>
                                                                        <option value="FI"  >
                                        Finlândia </option>
                                                                        <option value="FR"  >
                                        França</option>
                                                                        <option value="DE"  >
                                        Alemanha </option>
                                                                        <option value="GR"  >
                                        Grécia </option>
                                                                        <option value="GL"  >
                                        Gronelândia </option>
                                                                        <option value="GT"  >
                                        Guatemala </option>
                                                                        <option value="GY"  >
                                        Guiana </option>
                                                                        <option value="HT"  >
                                        Haiti</option>
                                                                        <option value="HN"  >
                                        Honduras</option>
                                                                        <option value="HK"  >
                                        Hong Kong</option>
                                                                        <option value="IN"  >
                                        Índia </option>
                                                                        <option value="ID"  >
                                        Indonésia </option>
                                                                        <option value="IE"  >
                                        Irlanda </option>
                                                                        <option value="IL"  >
                                        Israel</option>
                                                                        <option value="IT"  >
                                        Itália </option>
                                                                        <option value="CI"  >
                                        Costa do Marfim </option>
                                                                        <option value="JM"  >
                                        Jamaica</option>
                                                                        <option value="JP"  >
                                        Japão </option>
                                                                        <option value="LV"  >
                                        Letónia </option>
                                                                        <option value="LB"  >
                                        Líbano </option>
                                                                        <option value="LU"  >
                                        Luxemburgo </option>
                                                                        <option value="MY"  >
                                        Malásia </option>
                                                                        <option value="MX"  >
                                        México </option>
                                                                        <option value="MA"  >
                                        Marrocos </option>
                                                                        <option value="NL"  >
                                        Países Baixos</option>
                                                                        <option value="NI"  >
                                        Nicarágua</option>
                                                                        <option value="NG"  >
                                        Nigéria </option>
                                                                        <option value="NO"  >
                                        Noruega </option>
                                                                        <option value="PK"  >
                                        Paquistão </option>
                                                                        <option value="PA"  >
                                        Panamá </option>
                                                                        <option value="PG"  >
                                        Papua Nova Guiné</option>
                                                                        <option value="PY"  >
                                        Paraguai </option>
                                                                        <option value="PE"  >
                                        Peru </option>
                                                                        <option value="PH"  >
                                        Filipinas </option>
                                                                        <option value="PL"  >
                                        Polônia </option>
                                                                        <option value="PT"  >
                                        Portugal</option>
                                                                        <option value="PR"  >
                                         Porto Rico </option>
                                                                        <option value="RO"  >
                                        Roménia</option>
                                                                        <option value="RU"  >
                                        Rússia </option>
                                                                        <option value="LC"  >
                                        Santa Lúcia </option>
                                                                        <option value="SM"  >
                                        São Marino</option>
                                                                        <option value="SG"  >
                                        Cingapura </option>
                                                                        <option value="ZA"  >
                                        África do Sul</option>
                                                                        <option value="ES"  >
                                        Espanha</option>
                                                                        <option value="LK"  >
                                        Sri Lanka</option>
                                                                        <option value="SE"  >
                                         Suécia</option>
                                                                        <option value="CH"  >
                                        Suíça </option>
                                                                        <option value="TH"  >
                                        Tailândia </option>
                                                                        <option value="TR"  >
                                        Turquia </option>
                                                                        <option value="GB"  >
                                        Reino Unido</option>
                                                                        <option value="US"  >
                                        Estados Unidos</option>
                                                                        <option value="UY"  >
                                        Uruguai </option>
                                                                        <option value="VE"  >
                                        Venezuela</option>
                                                                    </select>
                             
                            </div>
                            <div class="form-group">
                                <label for="" class="label-form">Estado de Registro do Conselho*</label>
                                <select name="register_state" id="load_me_baby" class="form-control"
                                    onchange="getCities(this.value)" required>
                                    <option value="">Selecione..</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-form">Cidade de atuação*</label>
                                <select name="acting_city" id="" class="form-control" required>
                                    <option value="">Selecione..</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-form">Celular*</label>
                                <input type="text" name="cellphone" id="cellphone" class="form-control" required 
 onkeypress="Mascara(this);">
                            </div>
                            <div class="form-group">
                                <label for="" class="label-form">E-mail*</label>
                                <input type="email" name="email" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-form">Confirmar E-mail*</label>
                                <input type="email" name="email_confirmation" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-form">Senha* (mínimo 8 caracteres)</label>
                                <input type="password" name="password" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="label-form">Confirmar Senha*</label>
                                <input type="password" name="password_confirmation" id="" class="form-control" required>
                            </div>

                            




                            <div class="d-flex justify-content-between align-items-center m-0">
                                <label class="custom-control custom-checkbox m-0">
                                    <input type="checkbox" name="terms" class="custom-control-input" required>
                                    <span class="custom-control-label">Aceito os termos de
                                        uso</span>
                                </label>
                                <button type="submit" id="" class="btn btn-primary">Salvar Cadastro</button>
                            </div>
                        </form>
                        <!-- / Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <div class="loader"></div>
        <div clas="loader-txt">
          <p>Aguarde...</p>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('customjs')
<script>
    function getRegions(country_code) {

            request({
                url: `ajax/regions/${country_code}`,
                method: 'GET'
            }, function (response) {
                console.log(response);

                var { data } = response;

                $('select[name=register_state]').empty();
                $('select[name=register_state]').append('<option value="">Selecione..</option>');
                    $.each(data, function (key, value) {
                        $('select[name=register_state]').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
            }, function (err) {
                console.log(err);
            });    
        }
        
        function getCities(id) {

            request({
                url: `ajax/cities/${id}`,
                method: 'GET'
            }, function (response) {
                console.log(response);

                var { data } = response;

                $('select[name=acting_city]').empty();
                $('select[name=acting_city]').append('<option value="">Selecione..</option>');
                    $.each(data, function (key, value) {
                        $('select[name=acting_city]').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
            }, function (err) {
                console.log(err);
            });    
        }

        $(function () {
            getRegions('BR');
        });
</script>


<script>
jQuery(function($){
        $.datepicker.regional['pt-BR'] = {
                closeText: 'Fechar',
                prevText: '&#x3c;Anterior',
                nextText: 'Pr&oacute;ximo&#x3e;',
                currentText: 'Hoje',
                monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
                'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                'Jul','Ago','Set','Out','Nov','Dez'],
                dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 0,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
});

</script>
  
//mascara cpf
<script type="text/javascript">
			function fMasc(objeto,mascara) {
				obj=objeto
				masc=mascara
				setTimeout("fMascEx()",1)
			}
			function fMascEx() {
				obj.value=masc(obj.value)
			}
			function mTel(tel) {
				tel=tel.replace(/\D/g,"")
				tel=tel.replace(/^(\d)/,"($1")
				tel=tel.replace(/(.{3})(\d)/,"$1)$2")
				if(tel.length == 9) {
					tel=tel.replace(/(.{1})$/,"-$1")
				} else if (tel.length == 10) {
					tel=tel.replace(/(.{2})$/,"-$1")
				} else if (tel.length == 11) {
					tel=tel.replace(/(.{3})$/,"-$1")
				} else if (tel.length == 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				} else if (tel.length > 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				}
				return tel;
			}
			function mCNPJ(cnpj){
				cnpj=cnpj.replace(/\D/g,"")
				cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
				cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
				cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
				cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
				return cnpj
			}
			function mCPF(cpf){
				cpf=cpf.replace(/\D/g,"")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				return cpf
			}
			function mCEP(cep){
				cep=cep.replace(/\D/g,"")
				cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
				cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
				return cep
			}
			function mNum(num){
				num=num.replace(/\D/g,"")
				return num
			}

		
</script>
// mascara data
<script>
function mascaraData(val) {
  var pass = val.value;
  var expr = /[0123456789]/;

  for (i = 0; i < pass.length; i++) {
    // charAt -> retorna o caractere posicionado no índice especificado
    var lchar = val.value.charAt(i);
    var nchar = val.value.charAt(i + 1);

    if (i == 0) {
      // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
      // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
      // instStr.search(expReg);
      if ((lchar.search(expr) != 0) || (lchar > 3)) {
        val.value = "";
      }

    } else if (i == 1) {

      if (lchar.search(expr) != 0) {
        // substring(indice1,indice2)
        // indice1, indice2 -> será usado para delimitar a string
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }

    } else if (i == 4) {

      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }
    }

    if (i >= 6) {
      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
      }
    }
  }

  if (pass.length > 10)
    val.value = val.value.substring(0, 10);
  return true;
}





</script>
 <script> 
var behavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
options = {
    onKeyPress: function (val, e, field, options) {
        field.mask(behavior.apply({}, arguments), options);
    }
};

$('#cellphone').mask(behavior, options);
</script>



<script>
$(document).ready(function() {
    $("#click").click(function() {
      // disable button
      $(this).prop("disabled", true);
      // add spinner to button
      $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Finalizando...`
      );
    });
});
</script>

<script>

$(document).ready(function() {
  $("#just_load_please").on('change', 'input', function(e) {
    e.preventDefault();
    $("#loadMe").modal({
      backdrop: "static", //remove ability to close modal with click
      keyboard: false, //remove option to close with keyboard
      show: true //Display loader!
    });
    setTimeout(function() {
      $("#loadMe").modal("hide");
    }, 3000);
  });
  //ajax code here (example for $.post) using test page from https://reqres.in
  //Adding a delay so we can see the functionality of the loader while request processes
  $("#load_me_baby").on("change", function(e) {
    e.preventDefault();
    $("#loadMe").modal({
      backdrop: "static", //remove ability to close modal with click
      keyboard: false, //remove option to close with keyboard
      show: true //Display loader!
    });
    var testUrl = "https://reqres.in/api/users?delay=3";
    $.get(
      testUrl,
      function(response) {
        if (response.data[0]) {
          //if you received a successful return, remove the modal. Either way remove the modal!!
          var resOutput =
            '<h4 style="color: white">Modal closed and output displayed!</h4><p style="color: white">This is <b>' +
            response.data[0].first_name +
            " " +
            response.data[0].last_name +
            '</b></p><img src="' +
            response.data[0].avatar +
            '" class="img-responsive img-thumbnail" alt="avatar" style="margin-top: 13px; max-width="200px;">';
          $("#output").html(resOutput);
          $("#loadMe").modal("hide");
        } else {
          $("#output").html(
            '<div class="alert alert-warning"><h4>Uh oh!</h4></div>'
          );
        }
      },
      "json"
    );
  });
});

</script>
@endsection