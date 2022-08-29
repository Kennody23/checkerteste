            var audio = new Audio('blp.mp3');
            $(document).ready(function () {
              var i = 1;
              $('#iniciarchk').attr('disabled', null);
              $('#iniciarchk').click(function () {
                audio.play();
                $('#iniciarchk').attr('disabled', 'disabled');
                var line = $('#listateste').val().replace(',', '').split('\n');
                line = line.filter( function( item, index, inputArray ) {
                  return inputArray.indexOf(item) == index;
                });
                var total = line.length;
                var ap = 0;
                var rp = 0;
                var iv = 0;
                var testadu = 0;
                var st = 'Aguardando...';
				var key = $("#key").val();
                $('#estado').html("Iniciado.");
                $('#carregadas').html(total);
                $("#listateste").val(line.join("\n"));
                $('#listateste').attr('disabled', 'disabled');
                $('#pararchk').attr('disabled', null);
                $('#listateste').attr("style", "display:none");
                $('#resultados').attr("style", "display:block;margin-left:170px;margin-bottom:5px");
                $('#progressbr').attr("style", "display:block; margin-bottom:5px");
                line.forEach(function (value){
                  if (value == "") {
                    removelinha();
                    return;
                  }
                  var ajaxCall = $.ajax({

                    url: 'api.php',
                    type: 'GET',
                    data: 'lista=' + value + '&key=' + key,
                    success: function (data) {
                      var status = data.includes("✅");
                      if (status) {
                        removelinha();
                        $('#estado').html("Aprovada");
                        document.getElementById("lives").innerHTML += data;
                        testadu = testadu + 1;
                        ap = ap + 1;
                        audio.play();
                      }else if (data.includes("cc_rejected_high_risk")){
                        removelinha();
                        $('#estado').html("Key reprovada.");
                        document.getElementById("socksdie").innerHTML += data;
                        testadu = testadu + 1;
                        iv = iv + 1;
                      }else{
                        removelinha();
                        $('#estado').html("Reprovada.");
                        document.getElementById("die").innerHTML += data;
                        testadu = testadu + 1;
                        rp = rp + 1;
                      }
                      var fila = parseInt(ap) + parseInt(rp)+ parseInt(iv);
                      $('#aprovadas').html(ap);
                      $('#reprovadas').html(rp);
                      $('#testadas').html(fila);
                      porcentagem(total, fila);
                      if (fila == total) {
                        $('#iniciarchk').attr('disabled', null);
                        $('#pararchk').attr('disabled', 'disabled');
                        $('#listateste').attr('disabled', null);
                        $('#listateste').attr("style", "display:block; width: 900px; margin-bottom: 5px");
                        audio.play();
                        document.getElementById("estado").innerHTML = "Finalizado. ";
                      }
                    }
                  });
                  $('#pararchk').click(function () {
                    ajaxCall.abort();
                    $('#iniciarchk').attr('disabled', null);
                    $('#pararchk').attr('disabled', 'disabled');
                    $('#listateste').attr('disabled', null);
                    $('#listateste').attr("style", "display:block");
                    var st = 'Pausado...';
                    $('#estado').html(st);
                  });
                });
              });

            });
            function removelinha() {
              var lines = $("#listateste").val().split('\n');
              lines.splice(0, 1);
              $("#listateste").val(lines.join("\n"));
            }
            function porcentagem(total, pctm){
              var porcentagem = (pctm/total) * 100 + "%";
              var el = document.getElementById("progresstest");
              el.style.width = porcentagem;
            }
            function limpar() {
              document.getElementById("listateste").value = "";
            }