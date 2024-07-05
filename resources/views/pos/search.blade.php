<style>
    .search-con {
        position: relative;
    }

    .sbox {
        position: absolute;
        z-index: 9;
        max-height: 50vh;
        overflow-y: scroll;
        overflow-x: hidden;
    }
</style>

<div class="form-group search-con" id="search_item">
    <input type="search" id="search" class="form-control py-1" placeholder="Enter product name to search" autofocus>
    <div class="sbox rounded-bottom border shadow bg-white p-2" style="width: 100%; display: none">
    </div>
</div>


<div class="form-group" id="add_item" style="display: none">
    <input type="search" id="service_name" class="form-control py-1" placeholder="Enter Hospital Service Name">
</div>
