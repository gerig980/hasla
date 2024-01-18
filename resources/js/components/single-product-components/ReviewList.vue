<template>
<DataTable id="datatable" class="display" :data="data" width="100%">
<thead>
    <tr>
        <th></th>
        <th></th>
        <th></th>
    </tr>
</thead>
</DataTable>
</template>
<script>
import DataTable from 'datatables.net-vue3'
export default {
    components: {
        DataTable,
    },
    data() {
        return {
            data: [
                ['<p>Adela</p>', 
                '<div><div class="rating d-flex"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span></div><p>Lorem ipsum dolor sit amet,consectetur adipiscing elit.Proin augue risus, lobortis ultricevelit non, accumsan condimentum est. Ut orci tortor, pharetra a est vitae, facilisis luctus ante. Ut vitae dapibus leo.</p><div class="questions"><p><span>Si të rrinin:</span> Fiks</p><p><span>Ngjyra:</span> E zezë</p><p><span>Masa:</span> Medium</p></div></div>',
                 '<div class="like"><button class="like-button">&nbsp;</button><p>Vlefshme (9)</p></div><div class="date"><p>20 Gusht 2022</p></div>'],
                 ['<p>Ariola</p>', 
                '<div><div class="rating d-flex"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div><p>Lorem ipsum dolor sit amet,consectetur adipiscing elit.Proin augue risus, lobortis ultricevelit non, accumsan condimentum est. Ut orci tortor, pharetra a est vitae, facilisis luctus ante. Ut vitae dapibus leo.</p><div class="questions"><p><span>Si të rrinin:</span> Fiks</p><p><span>Ngjyra:</span> E zezë</p><p><span>Masa:</span> Medium</p></div></div>',
                 '<div class="like"><button class="like-button">&nbsp;</button><p>Vlefshme (9)</p></div><div class="date"><p>20 Gusht 2022</p></div>'],
                 ['<p>Sidorela</p>', 
                '<div><div class="rating d-flex"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div><p>Lorem ipsum dolor sit amet,consectetur adipiscing elit.Proin augue risus, lobortis ultricevelit non, accumsan condimentum est. Ut orci tortor, pharetra a est vitae, facilisis luctus ante. Ut vitae dapibus leo.</p><div class="questions"><p><span>Si të rrinin:</span> Fiks</p><p><span>Ngjyra:</span> E zezë</p><p><span>Masa:</span> Medium</p></div></div>',
                 '<div class="like"><button class="like-button">&nbsp;</button><p>Vlefshme (9)</p></div><div class="date"><p>20 Gusht 2022</p></div>'],
                 ['<p>Arjeta</p>', 
                '<div><div class="rating d-flex"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span></div><p>Lorem ipsum dolor sit amet,consectetur adipiscing elit.Proin augue risus, lobortis ultricevelit non, accumsan condimentum est. Ut orci tortor, pharetra a est vitae, facilisis luctus ante. Ut vitae dapibus leo.</p><div class="questions"><p><span>Si të rrinin:</span> Fiks</p><p><span>Ngjyra:</span> E zezë</p><p><span>Masa:</span> Medium</p></div></div>',
                 '<div class="like"><button class="like-button">&nbsp;</button><p>Vlefshme (9)</p></div><div class="date"><p>20 Gusht 2022</p></div>'],
                 
            ],
            pageLength: 3,
        }
    }
}

</script>
<style>
td p {
    font-weight: 600;
}
td {
    padding-top:20px;
    padding-bottom:20px;
}
.questions {
    display:flex !important;
    justify-content:space-between;
    font-size:0.9rem;
    color: #7A7A7A;
}
.questions span {
    font-weight:600;
}
.display td {
    width: 33%;
    border-bottom:2px solid #E0E0E0;
}
.dataTables_length, .dataTables_filter {
    display: none !important;
}
.like {
    display: flex;
    justify-content: end;
}
.date {
    margin-top: auto;
    margin-bottom:0;
    display: flex;
    justify-content: end;
}
.like p, .date p, .dataTables_info {
    color: #7A7A7A;
    line-height:1;
    margin-bottom:0;
}
.date p, .dataTables_info {
    font-size:0.8rem;
}
.dataTables_info, .dataTables_paginate {
    margin-top:20px;
    display: flex;
    justify-content: end !important;
}
.like-button {
    background-image: url('../../assets/like.png');
    width:40px;
    height: 40px;
    background-repeat: no-repeat;
    background-color:transparent;
    border:0;
    box-shadow:none;
}
.dataTables_paginate .paginate_button  {
    color: #020202;
    font-size:0.9rem;
}
.dataTables_paginate .paginate_button.current {
    color:#fff;
    width:35px;
    height:35px;
    padding:0px 6px;
    background:#020202;
    border:1px solid transparent;
    border-radius:50%;
}
.dataTables_paginate span {
    margin:0px 10px;
}
</style>