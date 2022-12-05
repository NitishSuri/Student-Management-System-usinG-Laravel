 <template>
    <div class="add-student" v-loading="blockUI">
        <el-form ref="form" :model="formData.student" :rules="formData.rules">
            <div class="row">
                <div class="col-md-3">
                    <el-form-item label="First Name" prop="firstName">
                        <el-input placeholder="Enter First Name" suffix-icon="el-icon-user" v-model="formData.student.firstName"></el-input>
                        <small class="text-danger" v-if="formData.errors.firstName">{{ formData.errors.firstName[0]}}</small>
                    </el-form-item>
                </div>
                <div class="col-md-3">
                    <el-form-item label="Last Name"  prop="lastName">
                        <el-input placeholder="Enter Last Name" suffix-icon="el-icon-user" v-model="formData.student.lastName"></el-input>
                          <small class="text-danger" v-if="formData.errors.lastName">{{ formData.errors.lastName[0]}}</small>
                    </el-form-item>
                </div>
                <div class="col-md-3">
                    <el-form-item label="Email" prop="email">
                        <el-input placeholder="Enter Email Address" suffix-icon="el-icon-user" v-model="formData.student.email"></el-input>
                          <small class="text-danger" v-if="formData.errors.email">{{ formData.errors.email[0]}}</small>
                    </el-form-item>
                </div>
                <div class="col-md-3">
                    <el-form-item label="Gender" prop="gender">
                        <el-radio-group v-model="formData.student.gender">
                        <el-radio-button label="male">Male</el-radio-button>
                        <el-radio-button label="female">Female</el-radio-button>
                        </el-radio-group>
                    </el-form-item>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <el-form-item>
                    <el-button type="primary" @click="addStudent">Add Student</el-button>
                    <el-button @click="resetForm">Cancel</el-button>
                </el-form-item>
                </div>
            </div>
        </el-form>
    </div>
</template>
<script>

export default {
   
   data() {
       return {
           blockUI : false,
           formData : {
               student : {
                   firstName : '',
                    lastName : '',
                    email : '',
                    gender : 'male',
               },
               rules : {
                    firstName: [ { required: true, message: 'Please enter first name', trigger: 'blur' } ],
                    lastName: [ { required: true, message: 'Please enter last name', trigger: 'blur' } ],
                    email: [ { required: true, message: 'Please enter email', trigger: 'blur' } ],
               },
               errors : {}
           }
       }
   },
   created() {

   },
   mounted() {

   },
   methods : {
       addStudent() {
            var vm = this;
            vm.blockUI = true;
            vm.$refs['form'].validate((valid) => {
                if (valid) {
                    axios.post("/api/student", vm.formData.student).then(
                        function(response) {
                            vm.$notify({title: 'Success', message: 'Student Added Sucessfully', type: 'success'}); 
                            vm.resetForm();
                            vm.blockUI = false;
                        }
                        ).catch(function(error) {
                            vm.formData.errors = error.response.data.errors
                            vm.$notify({title: 'Error', message: error.response.data.message, type: 'error'});
                            vm.blockUI = false;
                        }
                    );

                } else {
                    vm.$notify({title: 'Error', message: 'Please correct the form and submit agaib', type: 'error'});
                    return false;
                }
            });
       },
       resetForm() {
            var vm = this;
            vm.$refs['form'].resetFields();
        }
    }
}
</script>
