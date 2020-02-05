import React, { Component } from 'react';

import Buttonext from './Buttonok';
import Booklist from "./Booklist";

const initialState = {
    books: [],
    page: 0,
    total: 0,
    isFormFired: false,
    loading: true,
    search_string:""
};

/* Main Component */
class Main extends Component {

    constructor(props) {
        super(props);
        //Initialize the state in the constructor
        this.state = initialState;
        this.inputField = React.createRef();
        this.handleSubmit = this.handleSubmit.bind(this);
    }

    search(valueInput) {
        /* fetch API in action */
        fetch('/api/getbooks?q='+valueInput +'&page='+this.state.page)
            .then(response => {
                return response.json();
            })
            .then(books => {
                //Fetched books is stored in the state
                this.setState((prevState) => ({
                        page: prevState.page + 1,
                        books : this.state.books.concat(books.items), 
                        totalItems: books.totalItems,
                        loading: false,
                        search_string:valueInput,
                }));
            });
    }

    handleSubmit(event) {
         //preventDefault prevents page reload   
        event.preventDefault();
        this.setState({
            isFormFired:true
        })

        const valueInput = this.refs.inputField.value;
        if(valueInput.trim() != ""){
            this.search(valueInput);
        }
    }

    renderForm(){
        return(
            <form  onSubmit={this.handleSubmit} className="justify-content-center">
                <div className="col-8 mt-3 mb-2 offset-lg-2">
                        <input type="text" ref="inputField" className="form-control" placeholder="Search here..." aria-label="Search here" />
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
        this.search(this.state.search_string);
    }
}

export default Main

