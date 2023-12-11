<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p id="currentYear"></p>
        </div>
        <div class="float-end">
            <p>Development <span class="text-danger"></i></span> by Iemaduddin & Rr. Denti
            </p>
        </div>
    </div>
    <script>
        // Mendapatkan tahun saat ini
        var currentYear = new Date().getFullYear();

        // Memasukkan tahun ke dalam elemen HTML dengan id "currentYear"
        document.getElementById("currentYear").innerHTML = currentYear + " &copy; SIPK - MABAC";
    </script>
</footer>
