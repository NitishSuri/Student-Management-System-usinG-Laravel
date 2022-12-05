<template>
  <div>
    <h1>Edit Student</h1>
    <form @submit.prevent="updateStudent" ref="editForm">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" v-model="student.first_name">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" v-model="student.last_name">
            </div>
          </div> 
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" v-model="student.email">
            </div>
          </div> 
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Gender</label>
              <input type="text" class="form-control" v-model="student.gender">
            </div>
          </div> 
        </div>
        <br />
        <div class="form-group">
          <button class="btn btn-primary" @click="updateStudent('editForm')">Update</button>
        </div>
    </form>
  </div>
</template>
<script>
export default {
  props: ['id'],
    data() {
        return{

        student : {
          // id : '',
          first_name : '',
          last_name : '',
          email : '',
          gender : ''
        }
        }
        
    },
    created(){
        var vm =this;
        axios.get('/api/students/'+ vm.id).then(function(response){
            // vm.student.id = response.data.id
            vm.student.first_name = response.data.first_name
            vm.student.last_name = response.data.last_name
            vm.student.email = response.data.email
            vm.student.gender = response.data.gender

        })

            
    },
    mounted(){
        
        
    },
    methods: {
        getStudent(student){},
        updateStudent(){
            var vm = this;
            axios.put('/api/update/student/'+ vm.id, vm.student).then(function(response){
                window.location.href = '/edit/' + vm.id;
            })
            

        }

    },
}
</script>