<template>
    <div>
        <div style="margin: 5px 0; padding: 10px; border: 1px dotted black;">
            <form @submit.prevent="addArticle">
                <input type="text" 
                    placeholder="Title" 
                    v-model="article.title" style="padding: 5px; width: calc(100% - 10px);" />
                <br />
                <textarea rows="5" 
                    placeholder="Description" 
                    v-model="article.description" 
                    style="margin: 5px 0; padding: 5px; width: calc(100% - 10px); resize: none;"></textarea>
                <br />
                <input type="submit" 
                    v-bind:value="[!edit ? 'Save' : 'Update']" />
                <input type="button" 
                    v-bind:value="[!edit ? 'Clear' : 'Cancel']"
                    @click="clearForm(article)" />
            </form>
        </div>
        <ul style="margin: 5px 0; padding: 10px 0; list-style: none; display: table;">
            <li style="display: table-cell;">
                <a href="javascript:void(0);" 
                    v-bind:style="[!pagination.prev_page ? {'pointer-events': 'none'} : {}]" 
                    @click="fetchArticles(pagination.prev_page)">Prev</a>
            </li>
            <li style="padding: 0 10px; display: table-cell;">
                Page {{ pagination.current_page }} of {{ pagination.last_page }}
            </li>
            <li style="display: table-cell;">
                <a href="javascript:void(0);" 
                    v-bind:style="[!pagination.next_page ? {'pointer-events': 'none'} : {}]" 
                    @click="fetchArticles(pagination.next_page)">Next</a>
            </li>
        </ul>
        <div v-for="article in articles" 
            v-bind:key="article.id" 
            v-bind:title="article.created_at" 
            style="margin: 5px 0; padding: 10px; border: 1px dotted black;">
            <strong>{{ article.title }}</strong>
            <br />
            <p style="margin: 0; padding: 0;">{{ article.description }}</p>
            <a href="javascript:void(0);" 
                @click="editArticle(article)">Edit</a>
            <a href="javascript:void(0);" 
                @click="deleteArticle(article.id)">Delete</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                articles: [],
                article: {
                    id: '',
                    title:'',
                    description: ''
                },
                pagination: {},
                edit: false
            };
        },
        created() {
            this.fetchArticles();
        },
        methods: {
            fetchArticles(page_url) {
                let vm = this,
                    new_page_url = page_url || 'api/articles';
                fetch(new_page_url)
                .then(response => response.json())
                .then(response => {
                    this.articles = response.data;
                    let pageDetails = Object.assign({}, response);
                    delete pageDetails.data;
                    vm.makePagination(pageDetails);
                })
                .catch(err => console.log(err));
            },
            makePagination(pageDetails) {
                let pagination = {
                    next_page: pageDetails.next_page_url,
                    prev_page: pageDetails.prev_page_url,
                    current_page: pageDetails.current_page,
                    last_page: pageDetails.last_page,
                };
                this.pagination = pagination;
            },
            deleteArticle(id) {
                if(confirm('Are you sure to delete?')) {
                    fetch('api/article/' + id, {
                        method: 'delete'
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.fetchArticles();
                        alert('Article has been deleted');
                    })
                    .catch(err => console.log(err));
                }
            },
            addArticle() {
                if(this.edit === false) {
                    fetch('api/article', {
                        method: 'post',
                        body: JSON.stringify(this.article),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.article.title = '';
                        this.article.description = '';
                        this.fetchArticles();
                        alert('Article has been added');
                    })
                    .catch(err => console.log(err));
                } else {
                    fetch('api/article', {
                        method: 'put',
                        body: JSON.stringify(this.article),
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.article.title = '';
                        this.article.description = '';
                        this.fetchArticles();
                        alert('Article has been edited');
                    })
                    .catch(err => console.log(err));
                }
            },
            editArticle(article) {
                window.scrollTo(0,0);
                this.edit = true;
                this.article.id = article.id;
                this.article.title = article.title;
                this.article.description = article.description;
            },
            clearForm(article) {
                this.edit = false;
                this.article = {};
            }
        }
    }
</script>