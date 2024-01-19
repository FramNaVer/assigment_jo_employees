<template>
    <div>
        <h1>Departments Name</h1>
       <ul class="list-disc pl-4">
            <li v-for="item in dept" :key="item.id" class="">
                {{ item }}
            </li>
       </ul>
    </div> <br>

    <div>
        <h1>Name Employees</h1>
        <ul class="list-disc pl-4">
            <li v-for="item2 in emp" :key="item2.id">
                {{ item2 }}
            </li>
        </ul>
    </div> <br>

    <div>
        <h1>Firstname and emp_no Employees</h1>
        <ul class="list-disc pl-4">
            <li v-for="item3 in emp1" :key="item3.id">
                {{ item3 }}
            </li>
        </ul>
    </div> <br>

    <div>
        <h1>emp_no Employees 10009</h1>
        <ul class="list-disc pl-4">
            <li v-for="item4 in emp2" :key="item4.id">
                {{ item4 }}
            </li>
        </ul>
    </div> <br>

    <div>
        <h1>Firstname LIke T% age >70</h1>
        <ul class="list-disc pl-4">
            <li v-for="item5 in emp3" :key="item5.id">
                {{ item5 }}
            </li>
        </ul>
    </div> <br>

    <div>
        <h1>Dept_name and Dept_no Count</h1>
        <ul class="list-disc pl-4">
            <li v-for="item6 in emp4" :key="item6.id">
                {{ item6 }}
            </li>
        </ul>
    </div> <br>

    <div>
        <h1>Dept_emp and to date 2000</h1>
        <ul class="list-disc pl-4">
            <li v-for="item7 in emp5" :key="item7.id">
                {{ item7 }}
            </li>
        </ul>
    </div> <br>

    <div>
        <h1>Dept_emp and Test Join</h1>
        <ul class="list-disc pl-4">
            <li v-for="item8 in ljoin" :key="item8.id">
                {{ item8 }}
            </li>
        </ul>
    </div> <br>



</template>

<script setup>
import { defineProps } from 'vue'

const { dept, emp, emp1, emp2, emp3,emp4,emp5,ljoin } =
defineProps(["dept", "emp", "emp1", "emp2",
    "emp3", "emp4","emp5","ljoin"

]);
</script>

<style>
    h1{
        font-weight: bold;
        font-size: 1.3rem;
    }
</style>
