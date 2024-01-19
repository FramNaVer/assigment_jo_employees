<template>
    <div class="content">
        <!-- Departments -->
        <div class="name-department">
            <h1 class="text-2xl font-bold mb-4">Departments Name</h1>
            <ul class="list-disc pl-4">
                <li v-for="i in depart" :key="i.id" class="mb-2">{{ i.dept_name }}</li>
            </ul>
        </div>

        <!-- Male Employees -->
        <div class="male">
            <h1 class="text-2xl font-bold mb-4">Male Employees</h1>
            <ul class="list-disc pl-4">
                <li v-for="j in emp.data" :key="j.id" class="mb-2">
                    {{ j.first_name }} - {{ j.gender }}
                </li>
            </ul>
        </div>

        <!-- Female Employees -->
        <div class="female">
            <h1 class="text-2xl font-bold mb-4">Female Employees</h1>
            <ul class="list-disc pl-4">
                <li v-for="x in females.data" :key="x.id" class="mb-2">
                    {{ x.first_name }} - {{ x.age }} - {{ x.gender }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

var { emp, depart, females } = defineProps(["emp", "depart", "females"]);
</script>

<style>
    .content {
        display: flex;
        justify-content: center;
        margin-top: 1.5rem;
    }

    .name-department{
        border: 2px solid #ddd;
        box-shadow: 0 4px  8px rgba(0,0,0,0.1);
        margin-right: 5rem;
        padding: 2rem;
        border-radius: 20px;
    }

    .name-department:hover {
        background-color: rgb(62, 62, 62);
        transition: .3s;
        color: #ddd;
    }

    .male{
        border: 2px solid #ddd;
        box-shadow: 0 4px  8px rgba(0,0,0,0.1);
        margin-right: 5rem;
        padding: 2rem;
        border-radius: 20px;
    }

    .male:hover {
        background-color: rgb(62, 62, 62);
        transition: .3s;
        color: #ddd;
    }


    .female{
        border: 2px solid #ddd;
        box-shadow: 0 4px  8px rgba(0,0,0,0.1);
        margin-right: 5rem;
        padding: 2rem;
        border-radius: 20px;
    }

    .female:hover {
        background-color: rgb(62, 62, 62);
        transition: .3s;
        color: #ddd;
    }
</style>
