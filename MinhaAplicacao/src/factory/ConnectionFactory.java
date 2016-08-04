package factory;

import java.sql.DriverManager;
import java.sql.Connection;
import java.sql.SQLException;

public class ConnectionFactory {
    public Connection getConnection(){
        try{
            return DriverManager.getConnection("jdbc:mysql://localhost/projetoJava","root","admin");
        }
        catch(SQLException excecao){
            throw new RuntimeException(excecao);
        }
    }
}
