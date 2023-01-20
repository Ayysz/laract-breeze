import React from 'react'

const Form = ({error, handleChangeCode, handleChangePass, buttonClick, title, type}) => {
  return (
    <>
        <center>
            <b>Login {title}</b>
            <p>{error}</p>
        </center>
        <table>
            <tbody>

                <tr>
                    <td className="bar">{type}</td>
                    <td className="bar">
                        <input type="text"
                            onChange={e => handleChangeCode(e.target.value)}
                        />
                    </td>
                </tr>
                <tr>
                    <td className="bar">Password</td>
                    <td className="bar">
                        <input type="password"
                            onChange={e => handleChangePass(e.target.value)}
                        />
                    </td>
                </tr>
                <tr>
                    <td colSpan="2">
                        <center>
                            <button className="button-primary"
                                type='button'
                                onClick={() => buttonClick()}
                            >
                                Login
                            </button>
                        </center>
                    </td>
                </tr>
            </tbody>
        </table>
    </>
  )
}

export default Form