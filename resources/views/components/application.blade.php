<div class="modal fade" id="application" tabindex="-1" aria-labelledby="application" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="background-color: rgb(241,235,222); color:rgb(49, 26, 5);">
            <div class="modal-header border-0">
                <h1>Бронирование</h1>
                <button type="button" class="btn-close focus-ring focus-ring-warning border-0" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="/application/create">
                <div class="modal-body border-0">
                        <input type="hidden" name="id_procedure" value="">
                        <input type="hidden" name="date" id="modalInputDate">
                        <input type="hidden" name="time" id="modalInputTime">
                        <p id="modalDate"></p>
                        <p id="modalTime"></p>
                </div>
                <div class="modal-footer justify-content-center border-0">
                    <button type="button" class="btn btn-warning btn-lg">Забронировать</button>
                </div>
            </form>
        </div>
    </div>
</div>
