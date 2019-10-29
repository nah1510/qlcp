import React, { Component } from "react";
import ReactDOM from "react-dom";
import styled from "styled-components";

const MyHeader = styled.h1`
    color: red;
`;

export default class Example extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>
                            <MyHeader>
                                styled-components have accessed to this website
                                !
                            </MyHeader>
                            <div className="card-body">
                                I'm an example component!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById("example")) {
    ReactDOM.render(<Example />, document.getElementById("example"));
}
