import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Students }  from './students';
//import 'rxjs/Rx';
//import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class StudentsService {
  private url: string = "http://localhost/angular7/liste.php";

  constructor(private http: HttpClient) { }

 

   //obtenir les informations du students
  getStudents(){
    return this.http.get<Students[]>(this.url); 

  }

  deleteStudent(id:number){
    return this.http.delete<Students[]>("http://localhost/angular7/delete.php?id=" + id)
  }
  
   createStudents(student: Students){
     return this.http.post("http://localhost/angular7/inserer.php", student);
   }
   getStudentsById(id:number){
    return this.http.get<Students[]>("http://localhost/angular7/getStudentById.php?id=" + id)
   }

   updateStudent(student: Students){
       return this.http.put("http://localhost/angular7/update.php" + "?id=" + student.sId, student);
   }

}
