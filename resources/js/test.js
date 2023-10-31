import PrintCustomizePersonBlockComponent from "../../components/print_customize/tokyoas_print_customize_person_block.vue";
import CommonHeader from "../../components/print_customize/print_customize_common_header";
let app = new Vue({
    el: "section#print",
    data: {
        employeesPrint: [],
        startDate: window.start_date,
        endDate: window.end_date,
        totalPage: window.total_page,
    },
    methods: {
        fetchData: async function () {
            console.log(window.total_page);
            let url = window.fetching_data_url;
            let total_page = this.totalPage;
            let result = [];
            for (let i = 1; i <= total_page; i++) {
                let formData = new FormData();
                formData.append("page", i);
                await axios
                    .post(url, formData, {
                        headers: {
                            "Content-Type": "multipart/form-data",
                        },
                    })
                    .then((response) => {
                        if (
                            !_.isNil(response.data["status"]) &&
                            response.data["status"] == 200
                        ) {
                            result = result.concat(
                                response.data["employees_print"]
                            );
                        } else {
                            alert("Error page: " + i);
                        }
                    });
            }
            this.employeesPrint = result.sort((el1, el2) => {
                if (el1.allowance_1_value == el2.allowance_1_value) {
                    if (
                        el1.department_piority_number ==
                        el2.department_piority_number
                    ) {
                        if (
                            el1.employee_presentation_id ==
                            el2.employee_presentation_id
                        ) {
                            return 1;
                        } else if (
                            el1.employee_presentation_id >
                            el2.employee_presentation_id
                        ) {
                            return 1;
                        } else {
                            return -1;
                        }
                    } else if (
                        el1.department_piority_number >
                        el2.department_piority_number
                    ) {
                        return 1;
                    } else {
                        return -1;
                    }
                } else if (el1.allowance_1_value > el2.allowance_1_value) {
                    return 1;
                } else {
                    return -1;
                }
            });
        },
    },
    computed: {},
    created() {
        this.fetchData();
    },
    watch: {},
    components: {
        PrintCustomizePersonBlock: PrintCustomizePersonBlockComponent,
        CommonHeader: CommonHeader,
    },
});
