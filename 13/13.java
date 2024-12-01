import java.util.Date;
import java.io.PrintWriter;
import javax.servlet.http.HttpSession;
protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.setContentType("text/html");
        HttpSession session = request.getSession(true);

        String sessionId = session.getId();
        long creationTime = session.getCreationTime();
        long lastAccessedTime = session.getLastAccessedTime();

        PrintWriter out = response.getWriter();
        out.println("<html><head><title>Session Information</title></head><body>");
        out.println("<h2>Session Information</h2>");
        out.println("<p>Session ID: " + sessionId + "</p>");
        out.println("<p>Creation Time: " + new Date(creationTime) + "</p>");
        out.println("<p>Last Accessed Time: " + new Date(lastAccessedTime) + "</p>");
        out.println("</body></html>");
        out.close();
    }
