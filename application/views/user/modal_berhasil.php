<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <section class="sectiom-success p-5 mt-5">
    <div class="container text-center text-white">
        <div class="row">
            <div class="col-md">
                <!-- <img src="<?= base_url() ?>assets/image/success.png" alt="" width="250" height="250"> -->
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTMyIDE2aDM1MmMxNy42NzE4NzUgMCAzMiAxNC4zMjgxMjUgMzIgMzJ2NDMyYzAgMTcuNjcxODc1LTE0LjMyODEyNSAzMi0zMiAzMmgtMzUyYy0xNy42NzE4NzUgMC0zMi0xNC4zMjgxMjUtMzItMzJ2LTQzMmMwLTE3LjY3MTg3NSAxNC4zMjgxMjUtMzIgMzItMzJ6bTAgMCIgZmlsbD0iIzc3OTU5ZSIgZGF0YS1vcmlnaW5hbD0iI2VjY2U5MyIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTMyIDM3NC42MjV2LTMyNi42MjVoMzUydjQzMmgtMjQ2LjYyNXptMCAwIiBmaWxsPSIjZWZlZmVmIiBkYXRhLW9yaWdpbmFsPSIjZWZlZmVmIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtMTM3LjM3NSAzNzQuNjI1djEwNS4zNzVsLTEwNS4zNzUtMTA1LjM3NXptMCAwIiBmaWxsPSIjNDc1YzYyIiBkYXRhLW9yaWdpbmFsPSIjZTc2ZTU0IiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PHBhdGggeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBkPSJtMTI4IDY0di02NGgxNjB2NjRjMCAxNy42NzE4NzUtMTQuMzI4MTI1IDMyLTMyIDMyaC05NmMtMTcuNjcxODc1IDAtMzItMTQuMzI4MTI1LTMyLTMyem0wIDAiIGZpbGw9IiM0NzVjNjIiIGRhdGEtb3JpZ2luYWw9IiNlNzZlNTQiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGQ9Im01MTIgMzY4YzAgNzkuNTI3MzQ0LTY0LjQ3MjY1NiAxNDQtMTQ0IDE0NHMtMTQ0LTY0LjQ3MjY1Ni0xNDQtMTQ0IDY0LjQ3MjY1Ni0xNDQgMTQ0LTE0NCAxNDQgNjQuNDcyNjU2IDE0NCAxNDR6bTAgMCIgZmlsbD0iIzQ3NWM2MiIgZGF0YS1vcmlnaW5hbD0iIzQ4YzhlZiIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgZD0ibTMzNS4wMDc4MTIgNDI5LjY0ODQzOC0zMS4wMDc4MTItMzEuMDIzNDM4Yy02LjI0NjA5NC02LjI1LTYuMjQ2MDk0LTE2LjM3ODkwNiAwLTIyLjYyNXMxNi4zNzUtNi4yNDYwOTQgMjIuNjI1IDBsMTAuMzY3MTg4IDEwLjM1MTU2MiA3Mi40NjQ4NDMtNjAuMzk4NDM3YzYuNzg5MDYzLTUuNjY0MDYzIDE2Ljg4NjcxOS00Ljc0NjA5NCAyMi41NDI5NjkgMi4wNDY4NzUgNS42NjQwNjIgNi43ODkwNjIgNC43NDYwOTQgMTYuODg2NzE5LTIuMDQ2ODc1IDIyLjU0Mjk2OXptMCAwIiBmaWxsPSIjZmZmZmZmIiBkYXRhLW9yaWdpbmFsPSIjZmZmZmZmIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBmaWxsPSIjNzc5NTllIj48cGF0aCBkPSJtMTc2IDEyOGgxMjhjOC44MzU5MzggMCAxNiA3LjE2NDA2MiAxNiAxNnMtNy4xNjQwNjIgMTYtMTYgMTZoLTEyOGMtOC44MzU5MzggMC0xNi03LjE2NDA2Mi0xNi0xNnM3LjE2NDA2Mi0xNiAxNi0xNnptMCAwIiBmaWxsPSIjNzc5NTllIiBkYXRhLW9yaWdpbmFsPSIjNzc5NTllIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PHBhdGggZD0ibTk2IDEyOGgzMnYzMmgtMzJ6bTAgMCIgZmlsbD0iIzc3OTU5ZSIgZGF0YS1vcmlnaW5hbD0iIzc3OTU5ZSIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIGQ9Im05NiAxOTJoMzJ2MzJoLTMyem0wIDAiIGZpbGw9IiM3Nzk1OWUiIGRhdGEtb3JpZ2luYWw9IiM3Nzk1OWUiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48cGF0aCBkPSJtOTYgMjU2aDMydjMyaC0zMnptMCAwIiBmaWxsPSIjNzc5NTllIiBkYXRhLW9yaWdpbmFsPSIjNzc5NTllIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PHBhdGggZD0ibTk2IDMyMGgzMnYzMmgtMzJ6bTAgMCIgZmlsbD0iIzc3OTU5ZSIgZGF0YS1vcmlnaW5hbD0iIzc3OTU5ZSIgc3R5bGU9IiIgY2xhc3M9IiI+PC9wYXRoPjxwYXRoIGQ9Im0xNzYgMTkyaDk2YzguODM1OTM4IDAgMTYgNy4xNjQwNjIgMTYgMTZzLTcuMTY0MDYyIDE2LTE2IDE2aC05NmMtOC44MzU5MzggMC0xNi03LjE2NDA2Mi0xNi0xNnM3LjE2NDA2Mi0xNiAxNi0xNnptMCAwIiBmaWxsPSIjNzc5NTllIiBkYXRhLW9yaWdpbmFsPSIjNzc5NTllIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BhdGg+PHBhdGggZD0ibTE3NiAyNTZoMzJjOC44MzU5MzggMCAxNiA3LjE2NDA2MiAxNiAxNnMtNy4xNjQwNjIgMTYtMTYgMTZoLTMyYy04LjgzNTkzOCAwLTE2LTcuMTY0MDYyLTE2LTE2czcuMTY0MDYyLTE2IDE2LTE2em0wIDAiIGZpbGw9IiM3Nzk1OWUiIGRhdGEtb3JpZ2luYWw9IiM3Nzk1OWUiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD48L2c+PC9nPjwvc3ZnPg==" width="250" height="250" class="img-responsive"/>
                <h1 class="my-4">Berhasil Memperbarui Data</h1>
                <p>Selamat Pembaruan data anda berhasil, nantika promo promo lainya , tetap berlangganan <br>#stayathome #pakaimasker #jagajarak #socialdistance</p>
                <div class="text-center">
                    <a href="#" target="_blank"><i class="fab fa-facebook fa-2x text-light mr-2 mt-3"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-instagram fa-2x text-light mr-2 mt-3"></i></a>
                    <a href="#" target="_blank"><i class="fas fa-globe fa-2x text-light mr-2 mt-3"></i></a>


                </div>
            </div>
        </div>
    </div>
</section>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>