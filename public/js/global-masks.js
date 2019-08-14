$(document).ready(function($){
  let telefoneMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
  };

  let telefoneOptions = {
    onKeyPress: function (val, e, field, options) {
      field.mask(telefoneMaskBehavior.apply({}, arguments), options);
    },
    removeMaskOnSubmit: true
  };

  let cpfOptions = {
    reverse: true
  };

  $('.cpf').mask('000.000.000-00', cpfOptions);
  $('.telefone').mask(telefoneMaskBehavior, telefoneOptions);

  $("form").submit(function (e) {
    $('.cpf').unmask();
    $('.telefone').unmask();
  });
});
