(function() {
  var placesAutocomplete = places({
    appId: 'plQJ531G5XU0',
    apiKey: 'cf8dd4457018fe9b8960c47766972069',
    container: document.querySelector('#form-address'),
    templates: {
      value: function(suggestion) {
        return suggestion.name;
      }
    }
  }).configure({
    type: 'address'
  });
  placesAutocomplete.on('change', function resultSelected(e) {
    document.querySelector('#form-address2').value = e.suggestion.name || '';
    document.querySelector('#form-city').value = e.suggestion.city || '';
    document.querySelector('#form-zip').value = e.suggestion.postcode || '';
  });
})();

