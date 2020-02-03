import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { StudentsService } from '../students.service';
import { Router, Params, ActivatedRoute } from '@angular/router';
import { Students } from '../students';
@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.css']
})
export class EditComponent implements OnInit {

  constructor(private formBuilder: FormBuilder, 
    private _studentsService:StudentsService,
    private router:Router,
    private routes:ActivatedRoute
    ) { 

  }
  addForm: FormGroup;
  ngOnInit() {
    const routeParams = this.routes.snapshot.params;
    //console.log(routeParams.id);

    
    this.addForm = this.formBuilder.group({
          sId: [''],
          fName: ['', Validators.required],
          lName: ['', [Validators.required, Validators.maxLength(9)]],
          email: ['', [Validators.required, Validators.maxLength(30)]],
    });
    
    this._studentsService.getStudentsById(routeParams.id)
    .subscribe((data:any) => {
       
        this.addForm.patchValue(data);
    })
    
  }


 update(){
   //console.log(this.addForm.value);
   this._studentsService.updateStudent(this.addForm.value)
   .subscribe(() =>{
     this.router.navigate(['view']);
   },
    error => {
      alert(error);
    });
 }
}
