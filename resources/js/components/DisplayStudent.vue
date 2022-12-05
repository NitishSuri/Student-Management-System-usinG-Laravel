<template>
<div>
<div>

  <table style = "width: 100%">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      
        <tr v-for="student in students" :key="student.id">
          <td>{{ student.id }}</td>
          <td>{{ student.first_name }}</td>
          <td>{{ student.last_name }}</td>
          <td>{{ student.email }}</td>
          <td>{{ student.gender }}</td>
          <td>
            <template>
              <el-button size="mini" @click="editStudent(student)">Edit</el-button>
              <el-button size="mini" type="danger" @click="deleteStudents(student)">Delete</el-button>
            </template>
          </td>
      </tr>
    </tbody>
    <!-- <el-table-column label = "ID" prop = "id">{{ student.id }}</el-table-column>
    <el-table-column label = "First Name" prop = "firstname">{{ student.first_name }}</el-table-column>
    <el-table-column label = "Last Name" prop = "lastname">{{ student.last_name }}</el-table-column>
    <el-table-column label = "Email" prop = "email">{{ student.email }}</el-table-column>
    <el-table-column label = "Gender" prop = "gender">{{ student.gender }}</el-table-column>
    <el-table-column  label = "Actions">
      <template>
        <el-button size="mini" @click="editStudent(student)">Edit</el-button>
        <el-button size="mini" type="danger" @click="deleteStudents(student)">Delete</el-button>
      </template>
    </el-table-column> -->
  </table>
</div> 
</div>
</template>

<script>

  export default {
    data() {
      return {
        tableData: [{
          id : '',
          firstname : '',
          lastname : '',
          email : ''
        }],
        search : '',
        errors : {},
        students : []
      }
    },
    created(){
        this.displayStudent();
        
    },
    mounted(){
        
        
    },
    methods: {
        displayStudent(){
            var vm = this;
            axios.get('/api/student').then(function(response){
                vm.students=response.data;
            })

        },

      editStudent(student){
        var vm = this;
        window.location = '/edit/' + student.id;
      },
      deleteStudents(student){
       this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
          confirmButtonText: 'OK',
          cancelButtonText: 'Cancel',
          type: 'warning'
        }).then(() => {
        var vm = this;
        axios.post('/api/student/'+student.id).then(function(response){
            vm.displayStudent();
        })
          this.$message({
            type: 'success',
            message: 'Delete completed'
          });
        }).catch(() => {
          this.$message({
            type: 'info',
            message: 'Delete canceled'
          });          
        });

        
    }
    },
    
  }
</script>