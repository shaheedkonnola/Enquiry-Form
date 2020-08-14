<template>
  <div>
        <div class="table-responsive">
            <table id="report-table" class="table custom-table" style="width:100%">
                <thead>
                    <tr>
                      <th width="20px">Sl No</th>
                      <th>Date</th>
                      <th>Subject</th>
                      <th>Email From</th>
                      <th>Phone</th>
                      <th>View</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
         <div class="modal fade" tabindex="-1" role="dialog" id="ViewModal" data-backdrop="static">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title title my-0">Enquiry Details</h3>
                    </div>
                    <div class="modal-body">
                      

                      <h2>Hello</h2>

                            You have got an email from :{{ enquiry_data.name }} <br><br>

                            User details: <br><br>

                            Name: {{ enquiry_data.name }} <br>
                            Email: {{ enquiry_data.email }} <br>
                            Phone: {{ enquiry_data.phone }} <br>
                            Subject: {{ enquiry_data.subject }} <br>
                            Message: {{ enquiry_data.message }} <br><br>

                            Thanks      

                       
                           <div class="col-md-12">
                               <div class="form-group">
                                 
                                 <button class="btn btn-light float-right mr-2" ref="cancel_btn" data-dismiss="modal"  type="button">Close</button>
                                  
                                  
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
 </div>
</template>

<script>
import moment from 'moment';
import DataTable from 'datatables.net-bs4';
import 'datatables.net-bs4/css/dataTables.bootstrap4.min.css';

export default {
    props:[],
  
    created(){

    },
    mounted() {
        var vm = this
        
        
        this.table = $("#report-table").DataTable({
            ajax: {
                url: "/get_enquiries",
                type: "GET",
                dataSrc: '',
            },
            columns: [
            {
                render: function(data, type, row, meta) {
                    return '';
                },
            },
            { data: '',
                render: function(data, type, row, meta) {
                    return moment(row.created_at).format('DD/MM/YYYY h:mm:ss a');
                }
            },
            { data: 'subject' },
            { data: 'email' },
            { data: 'phone' },
            { data: '',
                    render: function(data, type, row, meta) {
                        return `<button class="btn btn-primary view-button" data-id="${row.id}">View</button>`;
                    }
            },
            ],
            columnDefs: [
                { "targets": ['nosearch'], "searchable": false },
                { "targets": 0, "sortable": false }
            ]
        });

        this.table.on( 'order.dt search.dt', ()=> {
            this.table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
      
        var vm = this;
        $(document).on('click','.view-button',function(){
            var id = $(this).data('id');
            vm.show_modal(id);
        })

        
    },
    data () {
       return {
            enquiry_data:[],
            loading: false,
            errors: {},
            table: ''
        }
    },
    methods : {
        getformatteddate(date) {
                        return moment(date, 'YYYY-MM-DD').format('DD/MM/YYYY');
                    },
        get_data(){
            this.table.ajax.reload();
        },
        show_modal(id) {
            axios.get('/find_enquiry/'+id)
                .then(response =>{
                    this.enquiry_data = response.data;
      
                    $('#ViewModal').modal('show');
                })
                .catch(function (error) {    
                });   
        },
        
    },
}
</script>

