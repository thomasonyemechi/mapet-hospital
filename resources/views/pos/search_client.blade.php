<style>
    .search-con {
        position: relative;
    }

    .sbox-client {
        position: absolute;
        z-index: 9;
        max-height: 50vh;
        overflow-y: scroll;
        overflow-x: hidden;
    }
</style>

<div class="form-group search-con">
    <input type="search" id="search_client" class="form-control py-1"
        placeholder="Enter patient card no, name, phone or email to search" autofocus>
    <div class="sbox-client rounded-bottom border shadow bg-white p-2" style="width: 100%; display: none">
    </div>
</div>
