import React, { Component } from 'react';

import Buttonext from './Buttonok';
import Booklist from "./Booklist";

const initialState = {
    books: [],
    page: 0,
    total: 0,
    isFormFired: false,
    search_string: '',
    loading: true
};

/* Main Component */
class Main extends Component {

    constructor(props) {
        super(props);
        //Initialize the state in the constructor
        this.state = initialState;
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleInput = this.handleInput.bind(this);
        this.handleButton = this.handleButton.bind(this);
    }
    /*componentDidMount() is a lifecycle method
     * that gets called after the component is rendered
     */

    componentDidMount() {
    }

    clear_and_search() {
        // this.setState(initialState);
        this.setState((prevState) => ({
                books: [],
                page: 0,
                total: 0,
                isFormFired: true,
                search_string: prevState.search_string,
                loading: true
        }));
        this.search();
    }

    search() {
        /* fetch API in action */
        fetch('/api/getbooks?q='+this.state.search_string +'&page='+this.state.page)
            .then(response => {
                return response.json();
            })
            .then(books => {
                //Fetched books is stored in the state
                this.setState((prevState) => ({
                        page: prevState.page + 1,
                        books : this.state.books.concat(books.items), 
                        totalItems: books.totalItems,
                        loading: false
                }));
            });
    }

    handleSubmit(event) {
         //preventDefault prevents page reload   
        event.preventDefault();
        this.clear_and_search()
    }

    handleInput(event) {
     
        /*Duplicating and updating the state */
        this.setState({ 
            search_string:event.target.value}, () => {
                console.log(this.state.search_string)
            });
    }

    handleButton(event){
        event.preventDefault();
        this.setState((prevState) => ({
            page: prevState.page + 1,
            search_string: prevState.search_string
        }));  
        this.search()
    }

    renderForm(){
        return(
            <form  onSubmit={this.handleSubmit} className="justify-content-center">
                <div className="col-8 mt-3 mb-2 offset-lg-2">
                        <input type="text" className="form-control" placeholder="Search here..." aria-label="Search here" onChange={(e)=>this.handleInput(e)}   />
                </div>
            </form>);
    }

    render() {
        const loading = this.state.loading;
        return (
            <div className={'container'}>
                { this.renderForm() }
                <div className="row">
                    <div className="col-12">
                            {loading && this.state.isFormFired ? (
                                <div className={'col text-center'}>
                                    <span className="fa fa-spin fa-spinner fa-4x"/>
                                </div>
                            ) : (<Booklist books = {this.state.books} />)}
                        </div>
                    <Buttonext page ={this.state.page}
                               isFormFired = {this.state.isFormFired}
                               onButtonNextClick ={this.handleButtonNextClick.bind(this)} />
                    </div>
            </div>
        );
    }

    handleButtonNextClick(){
        this.search();
    }
}

export default Main

