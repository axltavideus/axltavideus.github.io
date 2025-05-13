<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var el = document.getElementById('sortable-tbody');
    var sortable = Sortable.create(el, {
        animation: 150,
        onEnd: function (evt) {
            var order = [];
            el.querySelectorAll('tr').forEach(function (row) {
                order.push(row.getAttribute('data-id'));
            });

            fetch("{{ route('admin.contact_us_cards.reorder') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ order: order })
            }).then(response => response.json())
              .then(data => {
                  console.log(data.message);
              }).catch(error => {
                  console.error('Error:', error);
              });
        }
    });
});
</script>
