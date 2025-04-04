import java.util.Scanner;

public class SimpleCalculator { public static void main(String[] args) { Scanner s = new Scanner(System.in);

System.out.print("Enter first number: ");
    double a = s.nextDouble();
    
    System.out.print("Enter operator (+, -, *, /): ");
    char op = s.next().charAt(0);
    
    System.out.print("Enter second number: ");
    double b = s.nextDouble();
    
    double res = 0;
    if (op == '+') res = a + b;
    else if (op == '-') res = a - b;
    else if (op == '*') res = a * b;
    else if (op == '/' && b != 0) res = a / b;
    else {
        System.out.println("Invalid operation");
        s.close();
        return;
    }
    
    System.out.println("Result: " + res);
    s.close();
}

}

