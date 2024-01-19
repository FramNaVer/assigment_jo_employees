<template>
    <div class="content">
        <div>
        <h1>บริษัทมีตำแหน่งงานใดบ้าง</h1>
        <ul class="list-disc pl-4">
            <li v-for="dep in depart" :key="dep.id">
                {{ dep.dept_name }} {{ dep.dept_no }}
            </li>
        </ul>
    </div>

    <div>
        <h1>พนักงานแต่ละคนมีอายุเท่าไหร่</h1>
        <ul class="list-disc pl-4">
            <li v-for="emage in empage.data" :key="emage.id">
                Name =  {{ emage.first_name }} Age =  {{ emage.age }}
            </li>
        </ul>
    </div>

    <div>
        <h1>จำนวนพนักงานชาย/หญิง</h1>
        <ul class="list-disc pl-4">
            <li v-for="cougen in cougender" :key="cougen.id">
                    {{ cougen }}
            </li>
        </ul>
    </div>

    <div>
        <h1>หัวหน้าแผนกคนปัจจุบัน</h1>
        <ul class="list-disc pl-4">
            <li v-for="present in depmanager" :key="present.id">
                <h3>Name = {{ present.first_name }} {{ present.last_name }}</h3>
                <h3>Department = {{ present.dept_name }}</h3>
            </li>
        </ul>
    </div>

    <div>
        <h1>Salaries 9999-01-01</h1>
        <ul class="list-disc pl-4">
            <li v-for="salariesemp in salaemp.data" :key="salariesemp.id">
                {{ salariesemp.first_name }} {{ salariesemp.last_name }} {{ salariesemp.salary }}
            </li>
        </ul>
    </div>

    <div>
        <h1>จำนวนพนักงานในแต่ละแผนก</h1>
        <ul class="list-disc pl-4">
            <li v-for="departcou in departCount" :key="departcou.id">
                {{ departcou.dept_name }} {{ departcou.emp_count }}
            </li>
        </ul>
    </div>

    <div>
        <h1>ค่าเฉลี่ยเงินเดือนพนักงานแต่ละแผนก</h1>
        <ul class="list-disc pl-4">
            <li v-for="agsl in salaryAVG" :key="agsl.id">
                {{ agsl.dept_name }} Salary =  {{ agsl.salaryavg }}
            </li>
        </ul>
    </div>
    </div>

</template>

<script setup>

var { depart, empage, cougender, depmanager, salaemp, departCount,salaryAVG } =
defineProps(["depart", "empage", "cougender","depmanager","salaemp","departCount","salaryAVG"])

</script>

<style>


    h1{
        font-weight: bold;
        font-size: 1.3rem;
    }


</style>
